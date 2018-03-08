<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use PDF;
use App;
use Illuminate\Http\Response;

class PdfController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function make(Request $request)
    {
        /*$data = $request->all();

        $resultArray = $data['result'];
        $gpa = $data['gpa'];
        $student_id = $data['student_id'];

        $data = [
            'resultArray' => $resultArray,
            'gpa' => $gpa,
            'student_id' => $student_id,
        ];*/

      /*  $resultHtml = '';
        $gpaHtml = '';


        foreach($resultArray as $results){
            foreach($results as $result){
                if ($result['student_id'] == $student_id){
                    $resultHtml .=  "<tbody>
                                        <tr>
                                            <td align='center'>".$result['course_code']."</td>
                                            <td align='center'>".$result['unit']."</td>
                                            <td align='center'>".$result['C_A']."</td>
                                            <td align='center'>".$result['Exam']."</td>
                                            <td align='center'>".$result['total']."</td>
                                            <td align='center'>".$result['grade']."</td>
                                        </tr>
                                     </tbody>";
                }
            }
        }


        $gpaHtml .= "<tbody>
                        <tr>
                            <th align='center' colspan='2'>Total Grade Points:".$gpa['totalGradePoints']."</th>
                            <th align='center' colspan='2'>Total Units:".$gpa['totalUnits']."</th>
                            <th align='center' colspan='2'>GPA:".$gpa['gpa']."</th>
                        </tr>
                    </tbody>";

        $view =
        "
                <html>
                  <head>
                    <link href='plugins/bootstrap/css/bootstrap.min.css' rel='stylesheet' type='text/css' />
                    <link href='/plugins/summernote/summernote.css' rel='stylesheet'>
                    <link href='/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css' rel='stylesheet' type='text/css' />
                    <link rel='stylesheet' href='/plugins/material/material.min.css'>
                    <link rel='stylesheet' href='/css/material_style.css'>
                        <link href='/css/theme/light/theme_style.css' rel='stylesheet' id='rt_style_components' type='text/css' />
                        <link href='/css/theme/light/style.css' rel='stylesheet' type='text/css' />
                        <link href='/css/theme/light/theme-color.css' rel='stylesheet' type='text/css' />
                    <link href='/css/plugins.min.css' rel='stylesheet' type='text/css' />
                    <link href='/css/responsive.css' rel='stylesheet' type='text/css' />
                    <link href='/css/pages/formlayout.css' rel='stylesheet' type='text/css' />
                </head>                
                <body>
                    <div class='table-scrollable'>
                        <table class='table table-striped table-bordered table-hover table-checkable order-column valign-middle'>
                            <thead>
                            <tr>
                                <th align='center'>Course Code</th>
                                <th align='center'>Unit</th>
                                <th align='center'>C.A</th>
                                <th align='center'>Exam</th>
                                <th align='center'>Total</th>
                                <th align='center'>Grade</th>
                            </tr>
                            </thead>".$resultHtml.$gpaHtml."
                        </table>
                    </div>

                <script src='/plugins/jquery/jquery.min.js' ></script>
                <script src='/plugins/popper/popper.js' ></script>
                <script src='/plugins/jquery-blockui/jquery.blockui.min.js' ></script>
                <script src='/plugins/jquery-slimscroll/jquery.slimscroll.js'></script>
                <script src='/plugins/bootstrap/js/bootstrap.min.js' ></script>
                <script src='/plugins/bootstrap-switch/js/bootstrap-switch.min.js' ></script>
                <script src='/plugins/sparkline/jquery.sparkline.js' ></script>
                <script src='/js/pages/sparkline/sparkline-data.js' ></script>
                <script src='/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js'  charset=\"UTF-8\"></script>
                <script src='/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker-init.js'  charset=\"UTF-8\"></script>
                <script src='/js/app(copy).js' ></script>
                <script src='/js/layout.js' ></script>
                <script src='/js/pages/validation/form-validation.js' ></script>
                <script src='/js/theme-color.js' ></script>
                <script src='/plugins/material/material.min.js'></script>
                <script src='/plugins/chart-js/Chart.bundle.js' ></script>
                <script src='/plugins/chart-js/utils.js' ></script>
                <script src='/js/pages/chart/chartjs/home-data.js' ></script>
                <script src='/plugins/summernote/summernote.js' ></script>
                <script src='/js/pages/summernote/summernote-data.js' ></script>
                <!-- end js include path -->
                </body>
        ";*/

        $pdf = PDF::loadView('auth.login');
        return $pdf =  $pdf->download('result.pdf');


/*        return (new Response($pdf,200))->header('ContentType','application/pdf')
                                        ->header('Content-Disposition': 'attachment'; 'filename'="downloaded.pdf");*/
        /*if(Input::get('result') == null){
            $pdf = PDF::loadView('auth.login');
            return $pdf->download('result.pdf');
        }*/


    }

    public function download()
    {
        $pdf = PDF::loadView('auth.login');
        return $pdf->download('result.pdf');
    }

}
