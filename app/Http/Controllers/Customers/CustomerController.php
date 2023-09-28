<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;

use App\Models\Settings\Location\Country;
use App\Models\Settings\Location\Division;
use App\Models\Settings\Location\District;
use App\Models\Customers\Customer;
use App\Models\Settings\Branch;
use Illuminate\Http\Request;
use App\Http\Requests\Customer\AddNewRequest;
use App\Http\Requests\Customer\UpdateRequest;
use App\Http\Requests\Customer\frontAddRequest;
use App\Http\Requests\Customer\frontLoginCheckRequest;
use App\Http\Traits\ResponseTrait;
use Illuminate\Support\Facades\Crypt;
use Exception;

class CustomerController extends Controller
{
    use ResponseTrait;

    public function index()
    {
        if( currentUser()=='owner')
            $customers = Customer::where(company())->paginate(10);
        else
            $customers = Customer::where(company())->where(branch())->paginate(10);

        return view('customer.index',compact('customers'));
    }

    public function create()
    {
        $countries = Country::all();
        $divisions = Division::all();
        $districts = District::all();
        $branches = Branch::where(company())->get();
        return view('customer.create',compact('countries','divisions','districts','branches'));
    }

    public function store(AddNewRequest $request)
    {
        try{
            $cus= new Customer;
            $cus->customer_name= $request->customerName;
            $cus->contact= $request->contact;
            $cus->email= $request->email;
            $cus->phone= $request->phone;
            $cus->tax_number= $request->taxNumber;
            $cus->gst_number= $request->gstNumber;
            $cus->opening_balance= $request->openingAmount;
            $cus->country_id= $request->countryName;
            $cus->division_id= $request->divisionName;
            $cus->district_id= $request->districtName;
            $cus->post_code= $request->postCode;
            $cus->post_code= $request->postCode;
            $cus->address= $request->address;
            $cus->company_id=company()['company_id'];
            $cus->branch_id?branch()['branch_id']:null;
           
            if($cus->save())
                return redirect()->route(currentUser().'.customer.index')->with($this->resMessageHtml(true,null,'Successfully created'));
            else
                return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }catch(Exception $e){
            dd($e);
            return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }
    }

    public function show(customer $customer)
    {
        //
    }

    public function edit($id)
    {
        $countries = Country::all();
        $divisions = Division::all();
        $districts = District::all();
        $branches = Branch::where(company())->get();
        $customer = Customer::findOrFail(encryptor('decrypt',$id));
        return view('customer.edit',compact('countries','divisions','districts','customer','branches'));
    }

    public function update(UpdateRequest $request,$id)
    {
        try{
            $sup= Customer::findOrFail(encryptor('decrypt',$id));
            $sup->customer_name= $request->customerName;
            $sup->contact= $request->contact;
            $sup->email= $request->email;
            $sup->phone= $request->phone;
            $sup->tax_number= $request->taxNumber;
            $sup->gst_number= $request->gstNumber;
            $sup->opening_balance= $request->openingAmount;
            $sup->country_id= $request->countryName;
            $sup->division_id= $request->divisionName;
            $sup->district_id= $request->districtName;
            $sup->post_code= $request->postCode;
            $sup->post_code= $request->postCode;
            $sup->address= $request->address;
           
            if($sup->save())
                return redirect()->route(currentUser().'.customer.index')->with($this->resMessageHtml(true,null,'Successfully created'));
            else
                return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }catch(Exception $e){
            //dd($e);
            return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }
    }

    public function destroy($id)
    {
        $cat= Customer::findOrFail(encryptor('decrypt',$id));
        $cat->delete();
        return redirect()->back();
    }

    public function frontSingUpForm()
    {
        return view('customer.front-register');
    }

        public function frontsignUpStore(frontAddRequest $request)
    {
        // dd($request->all());
        try {
            $customer = new Customer;
            $customer->customer_name=$request->customer_name;
            $customer->phone=$request->phone;
            // $customer->address=$request->address;
            // $customer->email=$request->email;
            $customer->image='avater.jpg';
            $customer->password=Crypt::encryptString($request->password);
            if($customer->save()){
            return redirect(route('front.login'));
            }else{
            return redirect()->back()->with('please try again');
            }

        }catch(Exception $e){
            // Toastr::primary('Please try Again!');
            dd($e);
        }
    }

    public function frontSinInForm(){
        return view('customer.front-login');
    }

    public function frontCustomerLoginCheck(frontLoginCheckRequest $request)
    {
        try {
            $customer = Customer::where('mobile', $request->mobile)->first();
            if ($customer) {
                if ($request->password === Crypt::decryptString($customer->password)) {
                    $this->setSession($customer);
                    return redirect()->route('customer.dashboard')->with($this->resMessageHtml(true, null, 'Successfully login'));
                } else
                    return redirect()->route('login')->with($this->resMessageHtml(false, 'error', 'wrong cradential! Please try Again'));
            } else {
                return redirect()->route('login')->with($this->resMessageHtml(false, 'error', 'wrong cradential!. Or no user found!'));
            }
        } catch (Exception $error) {
            // dd($error);
            // Toastr::info('Please try Again!');
            return redirect()->route('login')->with($this->resMessageHtml(false, 'error', 'wrong cradential!'));
        }
    }

    public function setSession($customer){
        return request()->session()->put(
                [
                    'fontuserId'=>$customer->id,
                    'fontuserName'=>$customer->customer_name,
                    'fontuserEmail'=>$customer->email,
                    'fontshippingAddress'=>$customer->address,
                    'fontPhone'=>$customer->mobile,
                    'fontlanguage'=>$customer->language,
                    'fontImage'=>$customer->image?$customer->image:'no-image.png'
                ]
            );
    }

    public function frontsingOut(){
        request()->session()->flush();
        return redirect(route('front.login'))->with($this->resMessageHtml(false,'error','successfully Logout'));
    }
}
