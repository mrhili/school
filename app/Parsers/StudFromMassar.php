<?php
namespace App\Parsers;

use App\User;
use Cyberduck\LaravelExcel\Contract\ParserInterface;

class StudFromMassar implements ParserInterface
{
    public function transform($row, $header)
    {

      $model = new User();

      $model->zip_code = $row[0];
      $model->massarid = $row[1];
      $model->last_name = $row[2];
      $model->name = $row[3];
      $model->arabic_last_name = $row[4];
      $model->arabic_name = $row[5];
      $model->gender = ( $row[6] == 'Garçon');
      $model->birth_date = $row[7];
      if ( count ( $row ) == 9 ) {
        $model->birth_place = $row[8];
      }

      $model->role = 1.0;

      $pretendedEmail = str_slug( $model->name.'-'.$model->last_name , '-');

      $bones = 'fa.com';
      if (! User::where('email', $pretendedEmail ) ){
        $pretendedEmail .= $bones;
        $model->email = $pretendedEmail;
      }else{
        $pretendedEmail .= rand(0, 99);
        $pretendedEmail .= $bones;
        $model->email = $pretendedEmail;
      }

      $model->password = bcrypt('987654321');

      $model->save();

      return $model;

    }
}
