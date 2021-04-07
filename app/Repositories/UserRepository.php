<?php namespace App\Repositories;

use App\Models\Cd;
use App\Models\User;

class UserRepository extends BaseRepository
{

    /**
     * Users to auto set as admin at creation
     */
    const AUTO_ADMIN = array(
        'firstadmin@example.com',
        'secondadmin@example.com',
    );

    public function __construct(Cd $model)
    {
        parent::__construct($model);
    }

    public function create($data) {
        if (is_array($data) && in_array($data['email'], self::AUTO_ADMIN)) {
            $data['admin'] = true;
        } else if (get_class($data) == get_class($this->model) && in_array($data->email, self::AUTO_ADMIN)) {
            $data->admin = true;
        }

        return parent::create($data);
    }

    public function getByEmail($email)
    {
        if ($email == null) {
            return null;
        }
        return $this->model->where('email', '=', $email)->first();
    }
}
