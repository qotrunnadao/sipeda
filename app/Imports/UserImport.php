<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UserImport implements ToModel
{
	/**
	 * @param array $row
	 *
	 * @return \Illuminate\Database\Eloquent\Model|null
	 */
	public function model(array $row)
	{
		return new User([
			'email' => $row[0],
			'noInduk' => $row[1],
			'password' => $row[2],
			'level_id' => $row[3],
		]);
	}
}
