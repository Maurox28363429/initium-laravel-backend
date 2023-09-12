<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Row;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//auth
Route::post('refresh', 'App\Http\Controllers\UserController@refresh');
Route::post('register', 'App\Http\Controllers\UserController@register');

Route::post('inscribir', 'App\Http\Controllers\UserController@inscribir');

Route::post('login', 'App\Http\Controllers\UserController@authenticate');

Route::post('login_participante', 'App\Http\Controllers\UserController@authenticate_participante');

Route::get('auth', 'App\Http\Controllers\UserController@getAuthenticatedUser');
Route::post('getRecovery', 'App\Http\Controllers\UserController@getRecovery');
Route::post('validateRecovery', 'App\Http\Controllers\UserController@validateRecovery');
Route::post('putRecovery', 'App\Http\Controllers\UserController@putRecovery');


//user
Route::get('users', 'App\Http\Controllers\UserController@index');
Route::get('user/{id}', 'App\Http\Controllers\UserController@show');
Route::put('user/{id}', 'App\Http\Controllers\UserController@update');
Route::post('user/{id}', 'App\Http\Controllers\UserController@update');
Route::delete('user/{id}', 'App\Http\Controllers\UserController@delete');
//historial golobjetivos
Route::get('HistorialObjetivos', 'App\Http\Controllers\HistorialObjetivosController@index');
Route::get('HistorialObjetivos/{id}', 'App\Http\Controllers\HistorialObjetivosController@show');
Route::put('HistorialObjetivos/{id}', 'App\Http\Controllers\HistorialObjetivosController@update');
Route::post('HistorialObjetivos/{id}', 'App\Http\Controllers\HistorialObjetivosController@update');
Route::delete('HistorialObjetivos/{id}', 'App\Http\Controllers\HistorialObjetivosController@delete');
//Etapas CRUD
Route::get('etapas', 'App\Http\Controllers\EtapasController@index');
Route::get('etapa/{id}', 'App\Http\Controllers\EtapasController@show');
Route::post('etapas', 'App\Http\Controllers\EtapasController@store');
Route::put('etapa/{id}', 'App\Http\Controllers\EtapasController@update');
Route::delete('etapa/{id}', 'App\Http\Controllers\EtapasController@delete');
//Mapa de relaciones CRUD
Route::get('maparelaciones', 'App\Http\Controllers\MaparelacionesController@index');
Route::get('maparelaciones/{id}', 'App\Http\Controllers\MaparelacionesController@show');
Route::post('maparelaciones', 'App\Http\Controllers\MaparelacionesController@store');
Route::put('maparelaciones/{id}', 'App\Http\Controllers\MaparelacionesController@update');
Route::delete('maparelaciones/{id}', 'App\Http\Controllers\MaparelacionesController@delete');
//Jugadas de enrolamiento CRUD
Route::get('jugadas_enrolamiento', 'App\Http\Controllers\JugadasEnrrolamientoController@index');
Route::get('jugadas_enrolamiento/{id}', 'App\Http\Controllers\JugadasEnrrolamientoController@show');
Route::post('jugadas_enrolamiento', 'App\Http\Controllers\JugadasEnrrolamientoController@store');
Route::put('jugadas_enrolamiento/{id}', 'App\Http\Controllers\JugadasEnrrolamientoController@update');
Route::delete('jugadas_enrolamiento/{id}', 'App\Http\Controllers\JugadasEnrrolamientoController@delete');
//Cursos CRUD
Route::get('cursos', 'App\Http\Controllers\CursosController@index');
Route::get('curso/{id}', 'App\Http\Controllers\CursosController@show');
Route::post('curso', 'App\Http\Controllers\CursosController@store');
Route::put('curso/{id}', 'App\Http\Controllers\CursosController@update');
Route::delete('curso/{id}', 'App\Http\Controllers\CursosController@delete');
//Votaciones CRUD
Route::get('votaciones', 'App\Http\Controllers\CursovotacionesController@index');
Route::get('votaciones/{id}', 'App\Http\Controllers\CursovotacionesController@show');
Route::post('votaciones', 'App\Http\Controllers\CursovotacionesController@store');
Route::post('votaciones/{id}', 'App\Http\Controllers\CursovotacionesController@update');
Route::delete('votaciones/{id}', 'App\Http\Controllers\CursovotacionesController@delete');
//Voto CRUD
Route::get('voto', 'App\Http\Controllers\CursovotosController@index');
Route::get('voto-report', 'App\Http\Controllers\CursovotosController@report');
Route::get('voto-reportAll', 'App\Http\Controllers\CursovotosController@reportAll');
Route::get('voto/{id}', 'App\Http\Controllers\CursovotosController@show');
Route::post('voto', 'App\Http\Controllers\CursovotosController@store');
Route::put('voto/{id}', 'App\Http\Controllers\CursovotosController@update');
Route::delete('voto/{id}', 'App\Http\Controllers\CursovotosController@delete');
//golobjetivos CRUD
Route::get('golobjetivos', 'App\Http\Controllers\GolobjetivosController@index');
Route::get('golobjetivos/{id}', 'App\Http\Controllers\GolobjetivosController@show');
Route::get('golobjetivos_by_user/{id}', 'App\Http\Controllers\GolobjetivosController@golobjetivos_by_user');
Route::post('golobjetivos', 'App\Http\Controllers\GolobjetivosController@store');
Route::put('golobjetivos/{id}', 'App\Http\Controllers\GolobjetivosController@update');
Route::delete('golobjetivos/{id}', 'App\Http\Controllers\GolobjetivosController@delete');
//Clientes CRUD
Route::get('clientes', 'App\Http\Controllers\ClientesController@index');
Route::get('participantes_gol', 'App\Http\Controllers\ClientesController@participantes');
Route::get('cliente/{id}', 'App\Http\Controllers\ClientesController@show');
Route::get('cliente_by_user/{id}', 'App\Http\Controllers\ClientesController@show_by_user');
Route::post('clientes', 'App\Http\Controllers\ClientesController@store');
Route::post('clientes_public_form', 'App\Http\Controllers\ClientesController@clientes_public_form');
Route::put('cliente/{id}', 'App\Http\Controllers\ClientesController@update');
Route::delete('cliente/{id}', 'App\Http\Controllers\ClientesController@delete');
Route::post('clientes/pase', "App\Http\Controllers\ClientesController@pase_de_estudiantes");
Route::post('clientes_form', "App\Http\Controllers\ClientesController@register");
Route::post('import_gol', 'App\Http\Controllers\ClientesController@import_gol');


Route::get('clientes_excel_export', "App\Http\Controllers\ClientesController@clientes_excel_export");
Route::get('asistencia_excel_export', "App\Http\Controllers\ClientesController@asistencia_excel_export");
Route::get('promocion_excel_export', "App\Http\Controllers\ClientesController@promocion_excel_export");

//Noti CRUD
Route::get('notis', 'App\Http\Controllers\NotifyController@index');
Route::get('noti/{id}', 'App\Http\Controllers\NotifyController@show');
Route::post('notis', 'App\Http\Controllers\NotifyController@store');
Route::put('noti/{id}', 'App\Http\Controllers\NotifyController@update');
Route::delete('noti/{id}', 'App\Http\Controllers\NotifyController@delete');
Route::get('planes_pago', 'App\Http\Controllers\PlanesCursoController@index');
Route::get('planes_pago/{id}', 'App\Http\Controllers\PlanesCursoController@show');
Route::post('planes_pago', 'App\Http\Controllers\PlanesCursoController@store');
Route::post('planes_pago/{id}', 'App\Http\Controllers\PlanesCursoController@update');
Route::delete('planes_pago/{id}', 'App\Http\Controllers\PlanesCursoController@delete');
//Orders CRUD
Route::get('admin-orders', 'App\Http\Controllers\OrderController@index');
Route::get('admin-order/{id}', 'App\Http\Controllers\OrderController@show');
Route::post('admin-orders', 'App\Http\Controllers\OrderController@store');
Route::put('admin-order/{id}', 'App\Http\Controllers\OrderController@update');
Route::delete('admin-order/{id}', 'App\Http\Controllers\OrderController@delete');
//Pases CRUD
Route::get('pases_list', 'App\Http\Controllers\PasesController@index');
Route::get('pases_list/{id}', 'App\Http\Controllers\PasesController@show');
Route::post('pases_list', 'App\Http\Controllers\PasesController@store');
Route::put('pases_list/{id}', 'App\Http\Controllers\PasesController@update');
Route::delete('pases_list/{id}', 'App\Http\Controllers\PasesController@delete');
//Payment CRUD
Route::get('payments', 'App\Http\Controllers\PaymentsController@index');
Route::get('payment/{id}', 'App\Http\Controllers\PaymentsController@show');
Route::post('payments', 'App\Http\Controllers\PaymentsController@store');
Route::put('payment/{id}', 'App\Http\Controllers\PaymentsController@update');
Route::delete('payment/{id}', 'App\Http\Controllers\PaymentsController@delete');
//Roles
Route::get('roles', 'App\Http\Controllers\RolesController@index');
Route::get('role/{id}', 'App\Http\Controllers\RolesController@show');
Route::post('roles', 'App\Http\Controllers\RolesController@store');
Route::put('role/{id}', 'App\Http\Controllers\RolesController@update');
Route::delete('role/{id}', 'App\Http\Controllers\RolesController@delete');
//Asistencia CRUD
Route::get('assist', 'App\Http\Controllers\AsistenciaCursoController@index');
Route::get('assist/{id}', 'App\Http\Controllers\AsistenciaCursoController@show');
Route::post('assist', 'App\Http\Controllers\AsistenciaCursoController@store');
Route::put('assist/{id}', 'App\Http\Controllers\AsistenciaCursoController@update');
Route::delete('assist/{id}', 'App\Http\Controllers\AsistenciaCursoController@delete');
Route::get('assist_export', 'App\Http\Controllers\ClientesController@export_asistencia');
//Llego studiante CRUD
Route::get('llego', 'App\Http\Controllers\DiasCursoClienteController@index');
Route::get('llego/{id}', 'App\Http\Controllers\DiasCursoClienteController@show');
Route::post('llego', 'App\Http\Controllers\DiasCursoClienteController@store');
Route::put('llego/{id}', 'App\Http\Controllers\DiasCursoClienteController@update');
Route::delete('llego/{id}', 'App\Http\Controllers\DiasCursoClienteController@delete');

//ForminduccionController CRUD GOL

Route::get('forminduccion', 'App\Http\Controllers\ForminduccionController@index');
Route::get('forminduccion/{id}', 'App\Http\Controllers\ForminduccionController@show');
Route::post('forminduccion', 'App\Http\Controllers\ForminduccionController@store');
Route::put('forminduccion/{id}', 'App\Http\Controllers\ForminduccionController@update');
Route::delete('forminduccion/{id}', 'App\Http\Controllers\FormEciController@delete');
//ForminduccionController CRUD
Route::get('form_eci', 'App\Http\Controllers\FormEciController@index');
Route::get('form_eci/{id}', 'App\Http\Controllers\FormEciController@show');
Route::post('form_eci', 'App\Http\Controllers\FormEciController@store');
Route::put('form_eci/{id}', 'App\Http\Controllers\FormEciController@update');
Route::delete('form_eci/{id}', 'App\Http\Controllers\FormEciController@delete');
//ForminduccionController CRUD
Route::get('form_seg', 'App\Http\Controllers\FormSegController@index');
Route::get('form_seg/{id}', 'App\Http\Controllers\FormSegController@show');
Route::post('form_seg', 'App\Http\Controllers\FormSegController@store');
Route::put('form_seg/{id}', 'App\Http\Controllers\FormSegController@update');
Route::delete('form_seg/{id}', 'App\Http\Controllers\FormSegController@delete');
//CitascoordinadorController
Route::get('citascoordinador', 'App\Http\Controllers\CitascoordinadorController@index');
Route::get('citascoordinador/{id}', 'App\Http\Controllers\CitascoordinadorController@show');
Route::post('citascoordinador', 'App\Http\Controllers\CitascoordinadorController@store');
Route::put('citascoordinador/{id}', 'App\Http\Controllers\CitascoordinadorController@update');
Route::post('citascoordinador/{id}', 'App\Http\Controllers\CitascoordinadorController@update');
Route::delete('citascoordinador/{id}', 'App\Http\Controllers\CitascoordinadorController@delete');
//HorariocoordinadorController
Route::get('horariocoordinador', 'App\Http\Controllers\HorariocoordinadorController@index');
Route::get('horariocoordinador/{id}', 'App\Http\Controllers\HorariocoordinadorController@show');
Route::post('horariocoordinador', 'App\Http\Controllers\HorariocoordinadorController@store');
Route::put('horariocoordinador/{id}', 'App\Http\Controllers\HorariocoordinadorController@update');
Route::post('horariocoordinador/{id}', 'App\Http\Controllers\HorariocoordinadorController@update');
Route::delete('horariocoordinador/{id}', 'App\Http\Controllers\HorariocoordinadorController@delete');

Route::group(['middleware' => ['jwt.verify']], function () {
    /*AÑADE AQUI LAS RUTAS QUE QUIERAS PROTEGER CON JWT*/
});
//wordpress
Route::get('orders', 'App\Http\Controllers\WordpressController@orders');
Route::get('products', 'App\Http\Controllers\WordpressController@products');
Route::get('contratos', 'App\Http\Controllers\WordpressController@contratos');

Route::get('dash', 'App\Http\Controllers\DashboardController@index');

// use Maatwebsite\Excel\Facades\Excel;
// Route::post('importar_estudiantes', function(Request $request){
//        Excel::load($request->file('excel'), function ($reader) {
//               return response()->json($reader);
//        });
// });
Route::get('lider', 'App\Http\Controllers\ClientesController@lider');
Route::get('companeros', 'App\Http\Controllers\ClientesController@companeros');

Route::post('importar_estudiantes', 'App\Http\Controllers\ClientesController@import_estudiantes');

Route::get("horario", function (Request $request) {
    $cursos = [
        'SIC',
        'GOL',
        'ECI',
    ];
    $curso_input = $request->input('curso') ?? null;
    if ($curso_input) {
        $curso_input = strtoupper($curso_input);
    }
    if ($curso_input && in_array($curso_input, $cursos)) {
        $sic = [
            [
                "id" => 1,
                "title" => 'Inscripción y entrenamiento',
                "day" => 'Miércoles',
                "start" => '6:00 pm',
                "end" => '10:30 pm',
                "startInscripcion" => '4:30 pm',
                "endInscripcion" => '6:00 pm',
            ],
            [
                "id" => 2,
                "title" => 'Entrenamiento',
                "day" => 'Jueves',
                "start" => '6:00 pm',
                "end" => '10:30 pm',
            ],
            [
                "id" => 3,
                "title" => 'Entrenamiento',
                "day" => 'Viernes',
                "start" => '6:00 pm',
                "end" => '10:30 pm',
            ],
            [
                "id" => 4,
                "title" => 'Entrenamiento',
                "day" => 'Sábado',
                "start" => '10:00 am',
                "end" => '9:30 pm',
            ],
            [
                "id" => 5,
                "title" => 'Entrenamiento',
                "day" => 'Domingo',
                "start" => '10:00 am',
                "end" => '7:00 pm',
            ]
        ];
        $ECI = [
            [
                "id" => 6,
                "title" => 'Inscripción y entrenamiento',
                "day" => 'Miercoles',

                "startInscripcion" => '10:30 am',
                "endInscripcion" => '11:45 am',

                "start" => '12:00 pm',
                "end" => '11:00 pm',

            ],
            [
                "id" => 7,
                "title" => 'Entrenamiento',
                "day" => 'Jueves',
                "start" => '12:00 pm',
                "end" => '11:00 pm',
            ],
            [
                "id" => 8,
                "title" => 'Entrenamiento',
                "day" => 'Viernes',
                "start" => '12:00 pm',
                "end" => '11:00 pm',
            ],
            [
                "id" => 9,
                "title" => 'Entrenamiento',
                "day" => 'Sabado',
                "start" => '10:00 am',
                "end" => '10:00 pm',
            ],
            [
                "id" => 10,
                "title" => 'Entrenamiento',
                "day" => 'Domingo',
                "start" => '10:00 am',
                "end" => '7:00 pm',
            ],
        ];
        $GOL = [
            [
                "titulo" => "Primer fin de semana",
                "data" => [
                    [
                        "id" => 10,
                        "title" => 'Acreditación',
                        "day" => 'Viernes',
                        "start" => '6:00 pm - 6:59 pm',
                        "end" => '6:59 pm'
                    ],
                    [
                        "id" => 11,
                        "title" => 'Entrenamiento',
                        "day" => 'Viernes',
                        "start" => '7:00 pm',
                        "end" => 'Depende 100% del compromiso del grupo'
                    ],
                    [
                        "id" => 12,
                        "title" => 'Entrenamiento',
                        "day" => 'Sábado',
                        "start" => '10:00 am',
                        "end" => 'Depende 100% del compromiso del grupo'
                    ],
                    [
                        "id" => 13,
                        "title" => 'Entrenamiento',
                        "day" => 'Domingo',
                        "start" => '11:00 am',
                        "end" => 'Depende 100% del compromiso del grupo'
                    ],
                ]
            ],
            [
                "titulo" => "Segundo fin de semana",
                "data" => [
                    [
                        "id" => 14,
                        "title" => 'Entrenamiento',
                        "day" => 'Viernes',
                        "start" => '5:30 pm',
                        "end" => 'Depende 100% del compromiso del grupo'
                    ],
                    [
                        "id" => 16,
                        "title" => 'Entrenamiento',
                        "day" => 'Sábado',
                        "start" => '8:00 am',
                        "end" => 'Depende 100% del compromiso del grupo'
                    ],
                    [
                        "id" => 13,
                        "title" => 'Entrenamiento',
                        "day" => 'Domingo',
                        "start" => '10:00 am',
                        "end" => 'Depende 100% del compromiso del grupo'
                    ],
                ]
            ],
            [
                "titulo" => "Tercer fin de semana",
                "data" => [
                    [
                        "id" => 14,
                        "title" => 'Entrenamiento',
                        "day" => 'Viernes',
                        "start" => '5:30 pm',
                        "end" => 'Depende 100% del compromiso del grupo'
                    ],
                    [
                        "id" => 16,
                        "title" => 'Entrenamiento',
                        "day" => 'Sábado',
                        "start" => '8:00 am',
                        "end" => 'Depende 100% del compromiso del grupo'
                    ],
                    [
                        "id" => 13,
                        "title" => 'Outdoors',
                        "day" => 'Viernes - Domingo',
                        "start" => 'Partida Viernes 7:30 pm',
                        "end" => 'Regreso domingo 7:00 pm'
                    ],
                ]
            ],
        ];

        $data = [];
        switch ($curso_input) {
            case 'SIC':
                $data = $sic;
                break;
            case 'ECI':
                $data = $ECI;
                break;
            case 'GOL':
                $data = $GOL;
                break;
            default:
                $data = $sic;
                break;
        }
        return response()->json([
            'data' => $data
        ], 200);
    } else {
        return response()->json([
            'message' => 'Curso no encontrado'
        ], 404);
    }
});


Route::get("reglas", function (Request $request) {
    $cursos = [
        'SIC',
        'GOL',
        'ECI',
    ];
    $curso_input = $request->input('curso') ?? null;
    if ($curso_input) {
        $curso_input = strtoupper($curso_input);
    }
    if ($curso_input && in_array($curso_input, $cursos)) {
        $ECI = [
            [
                "id" => 1,
                "number" => 1,
                "description" =>
                'Mantenga absoluta confidencialidad de las vivencias y experiencias de los demás participantes. Jamás hable, comente o divulgue ningún tipo de información acerca del contenido de la Experiencia de Coaching Interpersona.',
            ],
            [
                "id" => 2,
                "number" => 2,
                "description" =>
                ' Sea puntual. El entrenamiento comienza a las doce del mediodía el miércoles, el jueves, y el viernes, a las diez de la mañana el sábado, y el domingo.',
            ],
            [
                "id" => 3,
                "number" => 3,
                "description" =>
                'No hable con las personas sentadas a su alrededor. Ni fume, coma, beba o mastique chicle dentro del salón de entrenamiento.',
            ],
            [
                "id" => 4,
                "number" => 4,
                "description" =>
                'Sea responsable por su bienestar físico. Aliméntese en forma adecuada y duerma lo suficiente. Por sobre todo, no olvide tomar los medicamentos recetados por su médico en la forma y horarios prescritos por el mismo.',
            ],
            [
                "id" => 5,
                "number" => 5,
                "description" =>
                ' No fume marihuana, ni consuma ningún tipo de bebida alcohólica o droga no recetada por su médico durante los cinco días.',
            ],
            [
                "id" => 6,
                "number" => 6,
                "description" =>
                'Lleve su nombre en un lugar visible durante todo el entrenamiento. Entregue su nametag antes de retirarse para el recreo de las comidas y antes de irse todas las noches.',
            ],
            [
                "id" => 7,
                "number" => 7,
                "description" =>
                'No use ningún tipo de grabador durante el entrenamiento. Sólo tome notas dentro del salón cuándo le sea indicado por el coach. Teléfonos celulares y dispositivos electrónicos similares deberán permanecer apagados durante todo el entrenamiento.',
            ],
            [
                "id" => 8,
                "number" => 8,
                "description" =>
                'No se siente al lado de personas conocidas desde antes de comenzar el SIC.',
            ],
            [
                "id" => 9,
                "number" => 9,
                "description" =>
                'No comience ningún tipo de relación sexual nueva con ningún participante por un período mínimo de 30 (treinta) días después de completar el entrenamiento.',
            ],
            [
                "id" => 10,
                "number" => 10,
                "description" =>
                'No realice ningún tipo de violencia física, hacia usted mismo, ni contra ninguna otra persona, tampoco hacia elementos de propiedad.',
            ],
        ];
        $SIC = [
            [
                "id" => 11,
                "number" => 1,
                "description" =>
                "Respeta la confidencialidad acerca de las vivencias y experiencias de los demás participantes.",
            ],
            [
                "id" => 12,
                "number" => 2,
                "description" =>
                "No hable con las personas sentadas a su alrededor. Haga preguntas, converse y comparta con los demás participantes únicamente cuando les sea permitido por el coach durante los períodos designados para tales actividades."
            ],
            [
                "id" => 13,
                "number" => 3,
                "description" =>
                "Participe en todas las sesiones del seminario. El seminario completo comprende los cinco días."
            ],
            [
                "id" => 14,
                "number" => 4,
                "description" =>
                "Sea puntual. Esté sentado antes de que termine la música. Momentos antes del comienzo de cada sesión e inmediatamente después de cada descanso, usted escuchará una pieza musical de aproximadamente un minuto y medio de duración. El seminario comienza a las seis de la tarde el miércoles, jueves y viernes, diez de la mañana el sábado y diez de la mañana el domingo."
            ],
            [
                "id" => 15,
                "number" => 5,
                "description" =>
                "No fume, coma, beba o masitque chicle dentro del salón donde se dicta el seminario."
            ],
            [
                "id" => 16,
                "number" => 6,
                "description" =>
                "No fume marihuana, ni consuma ningún tipo de bebida alcohólica o droga no recetada por su médico durante los cinco días."
            ],
            [
                "id" => 17,
                "number" => 7,
                "description" =>
                "Sea responsable por su bienestar físico. Aliméntese adecuadamente, duerma y descanse lo suficiente, y recuerde tomar sus medicamentos recetados en los horarios recomendados por su médico."
            ],
            [
                "id" => 18,
                "number" => 8,
                "description" =>
                "Lleve su nombre en un lugar visible durante todo el seminario. Devuélvalo al final de cada día y antes de las comidas."
            ],
            [
                "id" => 19,
                "number" => 9,
                "description" =>
                "No use ningún tipo de grabador ni tomen notas dentro del salón, durante todo el seminario. Teléfonos celulares y dispositivos electrónicos similares deberán permanecer apagados durante todo el seminario."
            ],
            [
                "id" => 20,
                "number" => 10,
                "description" =>
                "No se siente al lado de personas conocidas desde antes de comenzar el seminario."
            ],
        ];
        $GOL = [
            [
                "id" => 21,
                "number" => 1,
                "description" =>
                "Mantenga absoluta confidencialidad de las vivencias y experiencias de los demás participantes. Jamás hable, comente o divulgue ningún tipo de información acerca del contenido del entrenamiento."
            ],
            [
                "id" => 22,
                "number" => 2,
                "description" =>
                "Sea puntual."
            ],
            [
                "id" => 23,
                "number" => 3,
                "description" =>
                "No hable con las personas sentadas a su alrededor. Ni fume, coma, beba o masque chicle dentro del salón de entrenamiento."
            ],
            [
                "id" => 24,
                "number" => 4,
                "description" =>
                "Sea responsable por su bienestar físico. Aliméntese de forma adecuada y duerma lo suficiente. Por sobre todo, no olvide tomar los medicamentos recetados por su médico en la forma y horarios prescritos por el mismo."
            ],
            [
                "id" => 25,
                "number" => 5,
                "description" =>
                "No fume marihuana, ni consuma ningún tipo de bebida alcohólica o droga no recetada por su médico durante los fines de semana y reuniones de entrenamiento."
            ],
            [
                "id" => 26,
                "number" => 6,
                "description" =>
                "Sea responsable por su nametag. Lleve su nombre en un lugar visible durante las sesiones de entrenamiento. Devuélvalo al finalizar su participación en GOL."
            ],
            [
                "id" => 27,
                "number" => 7,
                "description" =>
                "No use ningún tipo de grabador durante el curso. Sólo tomen notas dentro del salón cuando les sea indicado por el coach."
            ],
            [
                "id" => 28,
                "number" => 8,
                "description" =>
                "Teléfonos celulares y dispositivos electrónicos similares deberán permanecer apagados durante las sesiones de entrenamiento."
            ],
            [
                "id" => 29,
                "number" => 9,
                "description" =>
                "No comience ningún tipo de relación sexual nueva con ningún participante por un período mínimo de 30 (treinta) días después de completar GOL."
            ],
            [
                "id" => 30,
                "number" => 10,
                "description" =>
                "No realice ningún tipo de violencia física, hacia usted mismo, ni contra ninguna otra persona, tampoco hacia elementos de propiedad."
            ]
        ];

        $data = [];
        switch ($curso_input) {
            case 'SIC':
                $data = $SIC;
                break;
            case 'ECI':
                $data = $ECI;
                break;
            case 'GOL':
                $data = $GOL;
                break;
            default:
                $data = $sic;
                break;
        }
        return response()->json([
            'data' => $data
        ], 200);
    } else {
        return response()->json([
            'message' => 'Curso no encontrado'
        ], 404);
    }
});
