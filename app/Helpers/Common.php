<?Php

namespace App\Helpers\Common;
use File;

use App\Helpers\Config\Setting;

use App\{
    Year,
    Month,
    User,
    StudentsPayment,
    Userspayment,
    History,
    HistoryCategory,
    Fournituration,
    Fourniture,
    TheClass,
    Meetingtype,
    Meeting,
    Meetingpopulating,
    PivotCoursub,
    Subjectclass,
    Teatchification,
    Demandefourniture

};

use Session;
use Carbon;
use Auth;
//TODO
/*
Add the Transport field to students
Add the Year life cycle

*/
  require __DIR__.'/common/documents.helpers.php';

  require __DIR__.'/common/pics.helpers.php';

  require __DIR__.'/common/pdfs.helpers.php';

  require __DIR__.'/common/formfields.helpers.php';

  require __DIR__.'/common/holder.helpers.php';

  require __DIR__.'/common/math.helpers.php';

  require __DIR__.'/common/timing.helpers.php';

  require __DIR__.'/common/relation.helpers.php';

  require __DIR__.'/common/application.helpers.php';
