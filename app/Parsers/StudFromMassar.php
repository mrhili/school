<?php
namespace App\Parsers;

use App\User;
use Cyberduck\LaravelExcel\Contract\ParserInterface;

class StudFromMassar implements ParserInterface
{

    public function transform($row, $header)
    {

      $model = new User();


      $pretendedEmail = str_slug( $row[3].'-'.$row[4] , '-');
      $bones = '@fa.com';

      while( !User::where('email', $pretendedEmail.$bones ) ){

        $pretendedEmail .= rand(0, 9);

      }

      $model->email = $pretendedEmail.$bones;
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
      $model->password = bcrypt('987654321');

      $model->save();

      return $model;

    }
}
