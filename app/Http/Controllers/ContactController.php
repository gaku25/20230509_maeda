<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use App\Providers\AppServiceProvider;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function index()
    {
    $contacts = Contact::all();
    return view('index');
    }

    public function thank()
    {
    $contacts = Contact::all();
    return view('thank');
    }


    public function add(Request $request)
    {
        $request->validate([
        'fullname' => 'required',
        'email' => 'required|email',
        'postcode' => 'required',
        'address' => 'required',
        'opinion' => 'required',
    ], [
        'fullname.required' => '・名前は必須です',
        'fullname.max'  => '・名前は255文字以内で入力してください',
        'email.required'=>'・メールアドレスは必須です',
        'email.email' => 'メールアドレスの形式で入力してください',
        'email.max' => '・メールアドレスは255文字以内で入力してください',
        'email.unique'=>'・このメールアドレスは登録済みです',
        'postcode.required'=>'・郵便番号は必須です',
        'postcode.max' => '・郵便番号は8文字以内入力してください',
        'address.required'=>'・住所は必須です',
        'address.max' => '・住所は255文字以内入力してください',
        'building_name.max' => '・建物名は255文字以内で入力してください',
        'opinion.required'=>'・ご意見は必須です',
    ]);
    $postcode = $request->input('postcode');
    if ($postcode) {
        $client = new Client();
        $response = $client->request('GET', 'https://zipcloud.ibsnet.co.jp/api/search', [
            'query' => [
                'zipcode' => $postcode,
            ],
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        $address = $result['results'][0]['address1'] . $result['results'][0]['address2'] . $result['results'][0]['address3'];
    } else {
        $address = $request->input('address');
    }
    $data = [
        'fullname' => $request->input('fullname'),
        'gender' => $request->input('gender'),
        'email' => $request->input('email'),
        'postcode' => $postcode,
        'address' => $address,
        'building_name' => $request->input('building_name'),
        'opinion' => $request->input('opinion'),
        ];
    return view('add', ['data' => $data]);
    }

    public function system(Request $request)
    {
    $contacts = Contact::Paginate(10);
    return view('search', ['contacts'=>$contacts]);
    }

    public function search(Request $request)
    {
        $fullname = $request->input('fullname');
        $gender = $request->input('sex');
        $from = $request->input('from');
        $to = $request->input('to');
        $email = $request->input('email');

        $contacts = Contact::query()
            ->when($fullname, function ($query, $fullname) {
                return $query->where('fullname', 'like', "%$fullname%");
            })
            ->when($gender !== null, function ($query, $gender) {
                return $query->where('gender', $gender);
            })
            ->when($from, function ($query, $from) {
                return $query->whereDate('created_at', '>=', $from);
            })
            ->when($to, function ($query, $to) {
                return $query->whereDate('created_at', '<=', $to);
            })
            ->when($email, function ($query, $email) {
                return $query->where('email', 'like', "%$email%");
            })
            ->paginate(10);

            $date = $request->input('date');
    $results = Contact::whereDate('created_at', '=', $date)->get();

        return view('search', compact('contacts'));
    }

    public function remove(Request $request)
    {
    $id = $request->input('id');
    $contact = contact::find($id);
    if ($contact) {
        $contact->delete();
    }
    return redirect('/system');
    }

    public function edit(Request $request)
    {
    return view('index')->with('input_data', $request->all());
    
    }

    public function complete(Request $request)
    {
    // if($request->input('back') == 'back'){
    $oldInput = Session::get('_old_input');
		\Illuminate\Support\Facades\Log::debug('$request = ' . print_r($oldInput, true));
    return redirect('/')
                ->withInput();
    }
    //     return view(complete)
    // }
}