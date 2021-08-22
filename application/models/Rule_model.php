<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rule_model extends CI_Model
{
    public function indexAuth()
    {
        return [
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|trim|alpha_dash'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|trim'
            ]
        ];
    }

    public function registration()
    {
        return [
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|trim|alpha_dash|min_length[3]|is_unique[user.username]',
                'errors' => ['is_unique' => 'This username has already registered']
            ],
            [
                'field' => 'name',
                'label' => 'Full Name',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'password1',
                'label' => 'Password',
                'rules' => 'required|trim|min_length[3]|matches[password2]',
                'errors' => [
                    'min_length' => 'Password too short!',
                    'matches' => 'Password does not match!'
                ]
            ],
            [
                'field' => 'password2',
                'label' => 'Password',
                'rules' => 'required|trim|matches[password1]'
            ]
        ];
    }

    public function edit_user()
    {
        return [
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|trim|alpha_dash|min_length[3]'
            ],
            [
                'field' => 'name',
                'label' => 'Full Name',
                'rules' => 'required|trim'
            ]
        ];
    }

    public function add_product()
    {
        return [
            [
                'field' => 'product',
                'label' => 'Product',
                'rules' => 'required|trim|is_unique[product.product]',
                'errors' => ['is_unique' => 'The product has already added']
            ],
            [
                'field' => 'price',
                'label' => 'Price',
                'rules' => 'required|numeric|max_length[5]',
                'errors' => ['max_length' => 'The price cannot exceed 5 digit number']
            ]
        ];
    }

    public function edit_product()
    {
        return [
            [
                'field' => 'product',
                'label' => 'Product',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'price',
                'label' => 'Price',
                'rules' => 'required|numeric|max_length[5]',
                'errors' => ['max_length' => 'The price cannot exceed 5 digit number']
            ]
        ];
    }

    public function add_outlet()
    {
        return [
            [
                'field' => 'outlet',
                'label' => 'Outlet',
                'rules' => 'required|trim|is_unique[outlet.outlet]',
                'errors' => ['is_unique' => 'The outlet has already added']
            ],
            [
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'required|trim'
            ]
        ];
    }

    public function edit_outlet()
    {
        return [
            [
                'field' => 'outlet',
                'label' => 'Outlet',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'required|trim'
            ]
        ];
    }

    public function create_new()
    {
        return [
            [
                'field' => 'product[]',
                'label' => 'Product',
                'rules' => 'required|trim'
            ]
        ];
    }
}
