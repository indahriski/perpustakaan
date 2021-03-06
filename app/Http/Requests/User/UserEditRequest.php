<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

/**
 * Class UserEditRequest
 *
 * @package App\Http\Requests\User
 */
class UserEditRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Declaration an attributes
     *
     * @var array
     */
    protected $attrs = [
        'name'    => 'Name',
        'class'   => 'Class',
        'address' => 'Address',
        'phone'   => 'Phone',
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'    => 'required|max:225',
            'class'   => 'required|max:225',
            'address' => 'required|max:60',
            'phone'   => 'required|max:225',
        ];
    }

    /**
     * @param $validator
     *
     * @return mixed
     */
    public function validator($validator)
    {
        return $validator->make($this->all(), $this->container->call([$this, 'rules']), $this->messages(), $this->attrs);
    }

}
