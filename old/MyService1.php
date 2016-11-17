<?php
error_reporting(0);
//
//include required class for build nnusoap web service server
require_once('lib/nusoap.php');

//$miURL= "http://". $_SERVER['SERVER_NAME']."/WSCaisa";
$miURL= "http://". $_SERVER['SERVER_NAME']."/demos/WSCaisa";
// Create the server instance
$server = new soap_server();
// Initialize WSDL support
$server->configureWSDL('PHP Web Services return array', 'urn:returnArray');

// Complex Type Struct for return array
$server->wsdl->addComplexType('ListBanks',
    'complexType',
    'struct',
    'all',
    '',
        array(
        'id_banco' => array('name' => 'id_banco', 'type' => 'xsd:int'),
        'nombre_banco' => array('name' => 'nombre_banco', 'type' => 'xsd:string'),		
		'fecha_creacion' => array('name' => 'fecha_creacion', 'type' => 'xsd:string'),
		'id_usuario' => array('name' => 'id_usuario', 'type' => 'xsd:int')
       )
    );
$server->wsdl->addComplexType('ListPositions',
    'complexType',
    'struct',
    'all',
    '',
        array(
        'id_cargo' => array('name' => 'id_cargo', 'type' => 'xsd:int'),
        'nombre_cargo' => array('name' => 'nombre_cargo', 'type' => 'xsd:string'),
        'codigo_cargo' => array('name' => 'codigo_cargo', 'type' => 'xsd:string'),
		'fecha_creacion' => array('name' => 'fecha_creacion', 'type' => 'xsd:string'),
		'id_usuario' => array('name' => 'id_usuario', 'type' => 'xsd:int')
       )
    );
$server->wsdl->addComplexType('ListBankAccount',
    'complexType',
    'struct',
    'all',
    '',
        array(
        'id_cuenta_banco_empleado' => array('name' => 'id_cuenta_banco_empleado', 'type' => 'xsd:int'),
        'id_empleado' => array('name' => 'id_empleado', 'type' => 'xsd:int'),
		'numero_empleado' => array('name' => 'numero_empleado', 'type' => 'xsd:string'),
		'nombre' => array('name' => 'nombre', 'type' => 'xsd:string'),
        'numero_cuenta' => array('name' => 'numero_cuenta', 'type' => 'xsd:string'),
		'id_tipo_cuenta' => array('name' => 'id_tipo_cuenta', 'type' => 'xsd:int'),
        'nombre_tipo_cuenta' => array('name' => 'nombre_tipo_cuenta', 'type' => 'xsd:string'),
		'tipo_tranferencia' => array('name' => 'tipo_tranferencia', 'type' => 'xsd:string'),
        'id_banco' => array('name' => 'id_banco', 'type' => 'xsd:int')
       )
    );
$server->wsdl->addComplexType('ListDepartments',
    'complexType',
    'struct',
    'all',
    '',
        array(
        'id_departamento' => array('name' => 'id_departamento', 'type' => 'xsd:int'),
		'nombre_departamento' => array('name' => 'nombre_departamento', 'type' => 'xsd:string'),
		'codigo_departamento' => array('name' => 'codigo_departamento', 'type' => 'xsd:string'),
		'fecha_creacion' => array('name' => 'fecha_creacion', 'type' => 'xsd:string'),
		'id_usuario' => array('name' => 'id_usuario', 'type' => 'xsd:int')
       )
    );
$server->wsdl->addComplexType('ListDiscountsIncome',
    'complexType',
    'struct',
    'all',
    '',
        array(
        'id_descuento_ingreso' => array('name' => 'id_descuento_ingreso', 'type' => 'xsd:int'),
		'cod_descuento_ingreso' => array('name' => 'cod_descuento_ingreso', 'type' => 'xsd:string'),
		'nombre_descuento_ingreso' => array('name' => 'nombre_descuento_ingreso', 'type' => 'xsd:string'),
		'tipo' => array('name' => 'tipo', 'type' => 'xsd:string'),
       	'numero_cuenta' => array('name' => 'numero_cuenta', 'type' => 'xsd:string'),		
		'fecha_creacion' => array('name' => 'fecha_creacion', 'type' => 'xsd:string'),
		'id_usuario' => array('name' => 'id_usuario', 'type' => 'xsd:int')
       )
    );
$server->wsdl->addComplexType('ListDiscountsIncomeEmployees',
    'complexType',
    'struct',
    'all',
    '',
        array(
        'id_descuento_ingreso_empleado' => array('name' => 'id_descuento_ingreso_empleado', 'type' => 'xsd:int'),
		'numero_cliente' => array('name' => 'numero_cliente', 'type' => 'xsd:string'),
		'numero_cuenta' => array('name' => 'numero_cuenta', 'type' => 'xsd:numero_cuenta'),
		'id_empleado' => array('name' => 'id_empleado', 'type' => 'xsd:int'),
       	'numero_empleado' => array('name' => 'numero_empleado', 'type' => 'xsd:string'),
		'id_descuento_ingreso' => array('name' =>'id_descuento_ingreso', 'type' => 'xsd:int'),
		'monto_mes' => array('name' => 'monto_mes', 'type' => 'xsd:string'),
		'monto_periodo' => array('name' => 'monto_periodo', 'type' => 'xsd:string'),
		'afecta_diciembre' => array('name' => 'afecta_diciembre', 'type' => 'xsd:string'),
       	'prioridad' => array('name' => 'prioridad', 'type' => 'xsd:string'),
		'tipo' => array('name' => 'tipo', 'type' => 'xsd:string'),
		'frecuencia' => array('name' => 'frecuencia', 'type' => 'xsd:string'),
		'monto_urgente' => array('name' => 'monto_urgente', 'type' => 'xsd:string'),
		'monto_original' => array('name' => 'monto_original', 'type' => 'xsd:string'),
		'monto_pendiente' => array('name' => 'monto_pendiente', 'type' => 'xsd:string'),
		'estado' => array('name' => 'estado', 'type' => 'xsd:int'),
		'referencia' => array('name' => 'referencia', 'type' => 'xsd:string'),
		'id_periodo' => array('name' => 'id_usuario', 'type' => 'xsd:int'),
		'fecha_creacion' => array('name' => 'fecha_creacion', 'type' => 'xsd:string'),
       	'id_usuario' => array('name' => 'id_usuario', 'type' => 'xsd:int')
       )
    );
	$server->wsdl->addComplexType('ListDiscountsIncomeEmployeesDetails',
    'complexType',
    'struct',
    'all',
    '',
        array(
        'id_descuento_ingreso_empleado' => array('name' => 'id_descuento_ingreso_empleado', 'type' => 'xsd:int'),
		'monto_mes' => array('name' => 'monto_mes', 'type' => 'xsd:string'),
		'monto_periodo' => array('name' => 'monto_periodo', 'type' => 'xsd:string'),
		'monto_original' => array('name' => 'monto_original', 'type' => 'xsd:string'),
		'monto_pendiente' => array('name' => 'monto_pendiente', 'type' => 'xsd:string'),
		'id_periodo' => array('name' => 'id_usuario', 'type' => 'xsd:int'),
		'fecha_creacion' => array('name' => 'fecha_creacion', 'type' => 'xsd:string'),
       	'id_usuario' => array('name' => 'id_usuario', 'type' => 'xsd:int')
       )
    );

$server->wsdl->addComplexType('ListDayHolidays',
    'complexType',
    'struct',
    'all',
    '',
        array(
        'id_dia_feriado' => array('name' => 'id_dia_feriado', 'type' => 'xsd:int'),
        'fecha_dia_feriado' => array('name' => 'fecha_dia_feriado', 'type' => 'xsd:string'),
        'celebracion' => array('name' => 'celebracion', 'type' => 'xsd:string'),		
		'fecha_creacion' => array('name' => 'fecha_creacion', 'type' => 'xsd:string'),
		'id_usuario' => array('name' => 'id_usuario', 'type' => 'xsd:int')
       )
    );

$server->wsdl->addComplexType('ListEmployees',
    'complexType',
    'struct',
    'all',
    '',
	   array(
	   'id_empleado'=>array('name'=>'id_empleado','type'=>'xsd:int'),
		'numero_empleado'=>array('name'=>'numero_empleado','type'=>'xsd:string'),
		'cedula'=>array('name'=>'cedula','type'=>'xsd:string'),
		'seguro_social'=>array('name'=>'seguro_social','type'=>'xsd:string'),
		'apellido'=>array('name'=>'apellido','type'=>'xsd:string'),
		'nombre'=>array('name'=>'nombre','type'=>'xsd:string'),
		'id_genero'=>array('name'=>'id_genero','type'=>'xsd:int'),
		'id_nacionalidad'=>array('name'=>'id_nacionalidad','type'=>'xsd:int'),
		'id_estado_civil'=>array('name'=>'id_estado_civil','type'=>'xsd:int'),
		'fecha_nacimiento'=>array('name'=>'fecha_nacimiento','type'=>'xsd:string'),
		'tipo_sangre'=>array('name'=>'tipo_sangre','type'=>'xsd:string'),
		'id_estado_empleado'=>array('name'=>'id_estado_empleado','type'=>'xsd:int'),
		'id_seccion'=>array('name'=>'id_seccion','type'=>'xsd:int'),
		'id_cargo'=>array('name'=>'id_cargo','type'=>'xsd:int'),
		'horas_x_periodo'=>array('name'=>'horas_x_periodo','type'=>'xsd:string'),
		'rata_x_hora'=>array('name'=>'rata_x_hora','type'=>'xsd:string'),
		'salario'=>array('name'=>'salario','type'=>'xsd:string'),
		'fecha_venc_contrato'=>array('name'=>'fecha_venc_contrato','type'=>'xsd:string'),
		'fecha_venc_carnet'=>array('name'=>'fecha_venc_carnet','type'=>'xsd:string'),
		'pago_efectivo'=>array('name'=>'pago_efectivo','type'=>'xsd:int'),
		'sindicato'=>array('name'=>'sindicato','type'=>'xsd:int'),
		'clave_renta'=>array('name'=>'clave_renta','type'=>'xsd:string'),
		'forma_pago'=>array('name'=>'forma_pago','type'=>'xsd:string'),
		'frecuencia_pago'=>array('name'=>'frecuencia_pago','type'=>'xsd:string'),
		'fecha_ingreso'=>array('name'=>'fecha_ingreso','type'=>'xsd:string'),
		'fecha_prox_vacaciones'=>array('name'=>'fecha_prox_vacaciones','type'=>'xsd:string'),
		'fecha_terminacion'=>array('name'=>'fecha_terminacion','type'=>'xsd:string'),
		'isr_gasto'=>array('name'=>'isr_gasto','type'=>'xsd:int'),
		'id_empresa'=>array('name'=>'id_empresa','type'=>'xsd:int')
       )
    );	
$server->wsdl->addComplexType('ListCompanies',
    'complexType',
    'struct',
    'all',
    '',
        array(
        'id_empresa' => array('name' => 'id_empresa', 'type' => 'xsd:int'),
		'nombre_empresa' => array('name' => 'nombre_empresa', 'type' => 'xsd:string'),
        'representante_legal' => array('name' => 'representante_legal', 'type' => 'xsd:string'),
		'direccion' => array('name' => 'direccion', 'type' => 'xsd:string'),
		'apartado_postal' => array('name' => 'apartado_postal', 'type' => 'xsd:string'),
		'comentario' => array('name' => 'comentario', 'type' => 'xsd:string'),
        'telefono_1' => array('name' => 'telefono_1', 'type' => 'xsd:string'),
		'telefono_2' => array('name' => 'telefono_2', 'type' => 'xsd:string'),
		'codigo_actividad' => array('name' => 'codigo_actividad', 'type' => 'xsd:int'),
        'anno_proceso' => array('name' => 'anno_proceso', 'type' => 'xsd:string'),
		'mes_proceso' => array('name' => 'mes_proceso', 'type' => 'xsd:string'),
		'clave_acceso' => array('name' => 'clave_acceso', 'type' => 'xsd:string')
       ) 
    );
$server->wsdl->addComplexType('ListStatesCivil',
    'complexType',
    'struct',
    'all',
    '',
        array(
        'id_estado_civil' => array('name' => 'id_estado_civil', 'type' => 'xsd:int'),
        'nombre_estado_civil' => array('name' => 'nombre_estado_civil', 'type' => 'xsd:string'),
		'fecha_creacion' => array('name' => 'fecha_creacion', 'type' => 'xsd:string'),
		'id_usuario' => array('name' => 'id_usuario', 'type' => 'xsd:int')
       )
    );
$server->wsdl->addComplexType('ListStatesEmployees',
    'complexType',
    'struct',
    'all',
    '',
        array(
        'id_estado_empleado' => array('name' => 'id_estado_empleado', 'type' => 'xsd:int'),
        'nombre_estado_empleado' => array('name' => 'nombre_estado_empleado', 'type' => 'xsd:string'),
		'descripcion' => array('name' => 'descripcion', 'type' => 'xsd:string'),
        'comentario' => array('name' => 'comentario', 'type' => 'xsd:string'),
		'fecha_creacion' => array('name' => 'fecha_creacion', 'type' => 'xsd:string'),
		'id_usuario' => array('name' => 'id_usuario', 'type' => 'xsd:int')
       )
    );
$server->wsdl->addComplexType('ListStatesUsers',
    'complexType',
    'struct',
    'all',
    '',
        array(
        'id_estado_usuario' => array('name' => 'id_estado_empleado', 'type' => 'xsd:int'),
        'nombre_estado_usuario' => array('name' => 'nombre_estado_empleado', 'type' => 'xsd:string'),
		'descripcion' => array('name' => 'descripcion', 'type' => 'xsd:string'),
        'fecha_creacion' => array('name' => 'fecha_creacion', 'type' => 'xsd:string'),
		'id_usuario' => array('name' => 'id_usuario', 'type' => 'xsd:int')
       )
    );
$server->wsdl->addComplexType('ListGenders',
    'complexType',
    'struct',
    'all',
    '',
        array(
        'id_genero' => array('name' => 'id_genero', 'type' => 'xsd:int'),
        'nombre_genero' => array('name' => 'nombre_genero', 'type' => 'xsd:string'),
		'fecha_creacion' => array('name' => 'fecha_creacion', 'type' => 'xsd:string'),
		'id_usuario' => array('name' => 'id_usuario', 'type' => 'xsd:int')
       )
    );
$server->wsdl->addComplexType('ListLegalTaxes',
    'complexType',
    'struct',
    'all',
    '',
        array(
        'id_impuesto_legal' => array('name' => 'id_impuesto_legal', 'type' => 'xsd:int'),
		'segsoc' => array('name' => 'segsoc', 'type' => 'xsd:string'),
        'segedu' => array('name' => 'segedu', 'type' => 'xsd:string'),
		'isr' => array('name' => 'isr', 'type' => 'xsd:string'),
		'porcentaje_segsoc' => array('name' => 'porcentaje_segsoc', 'type' => 'xsd:string'),
		'porcentaje_segedu' => array('name' => 'porcentaje_segedu', 'type' => 'xsd:string'),
		'porcentaje_isr' => array('name' => 'porcentaje_isr', 'type' => 'xsd:string'),
        'estado' => array('name' => 'estado', 'type' => 'xsd:int'),
        'fecha_creacion' => array('name' => 'fecha_creacion', 'type' => 'xsd:string'),
		'id_usuario' => array('name' => 'id_usuario', 'type' => 'xsd:int')
       )
    );
	
$server->wsdl->addComplexType('ListLegalTaxesEmployees',
    'complexType',
    'struct',
    'all',
    '',
        array(
        'id_impuesto_legal_empleado' => array('name' => 'id_impuesto_legal_empleado', 'type' => 'xsd:int'),
		'id_empleado' => array('name' => 'id_empleado', 'type' => 'xsd:int'),
		'numero_empleado' => array('name' => 'numero_empleado', 'type' => 'xsd:string'),
		'monto_ss' => array('name' => 'monto_ss', 'type' => 'xsd:string'),
		'monto_se' => array('name' => 'monto_se', 'type' => 'xsd:string'),
		'monto_isr' => array('name' => 'monto_isr', 'type' => 'xsd:string'),
		'id_periodo' => array('name' => 'id_periodo', 'type' => 'xsd:int'),
		'id_impuesto_legal' => array('name' => 'id_impuesto_legal', 'type' => 'xsd:int')
       )
    );
$server->wsdl->addComplexType('ListLegalTaxeEmployee',
    'complexType',
    'struct',
    'all',
    '',
        array(
        'id_empleado' => array('name' => 'id_empleado', 'type' => 'xsd:int'),
		'numero_empleado' => array('name' => 'numero_empleado', 'type' => 'xsd:string'),
		'monto_ss' => array('name' => 'monto_ss', 'type' => 'xsd:string'),
		'monto_se' => array('name' => 'monto_se', 'type' => 'xsd:string'),
		'monto_isr' => array('name' => 'monto_isr', 'type' => 'xsd:string'),
		'id_periodo' => array('name' => 'id_periodo', 'type' => 'xsd:int'),
		'id_impuesto_legal' => array('name' => 'id_impuesto_legal', 'type' => 'xsd:int')
       )
    );
$server->wsdl->addComplexType('ListWorkingDays',
    'complexType',
    'struct',
    'all',
    '',
        array(
        'id_jornada' => array('name' => 'id_jornada', 'type' => 'xsd:int'),
		'codigo_jornada' => array('name' => 'codigo_jornada', 'type' => 'xsd:string'),
        'id_turno' => array('name' => 'id_turno', 'type' => 'xsd:int'),
		'turno' => array('name' => 'turno', 'type' => 'xsd:string'),
		'descripcion' => array('name' => 'descripcion', 'type' => 'xsd:string'),
        'hora_inicia' => array('name' => 'hora_inicia', 'type' => 'xsd:string'),
		'hora_termina' => array('name' => 'hora_termina', 'type' => 'xsd:string'),
		'total_horas' => array('name' => 'total_horas', 'type' => 'xsd:string'),
		'paga' => array('name' => 'paga', 'type' => 'xsd:string'),
		'fecha_creacion' => array('name' => 'fecha_creacion', 'type' => 'xsd:string'),
		'id_usuario' => array('name' => 'id_usuario', 'type' => 'xsd:int')
       )
    );
$server->wsdl->addComplexType('ListWorkingDaysEmployees',
    'complexType',
    'struct',
    'all',
    '',
        array(
		'id_jornada_empleado' => array('name' => 'id_jornada_empleado', 'type' => 'xsd:int'),
        'id_empleado' => array('name' => 'id_empleado', 'type' => 'xsd:int'),
		'numero_empleado' => array('name' => 'numero_empleado', 'type' => 'xsd:string'),
		'fecha' => array('name' => 'fecha', 'type' => 'xsd:string'),
        'dia' => array('name' => 'dia', 'type' => 'xsd:string'),
		'laboro' => array('name' => 'laboro', 'type' => 'xsd:int'),
		'ausencia' => array('name' => 'ausencia', 'type' => 'xsd:string'),
		'tipo' => array('name' => 'tipo', 'type' => 'xsd:string'),
		'codigo' => array('name' => 'codigo', 'type' => 'xsd:string'),
        'codigo_jornada' => array('name' => 'codigo_jornada', 'type' => 'xsd:string'),
		'com' => array('name' => 'com', 'type' => 'xsd:string'),
		'hora_entra' => array('name' => 'hora_entra', 'type' => 'xsd:string'),
        'hora_sale' => array('name' => 'hora_sale', 'type' => 'xsd:string'),
		'horas_regulares' => array('name' => 'horas_regulares', 'type' => 'xsd:string'),
		'horas_extras' => array('name' => 'horas_extras', 'type' => 'xsd:string'),
		'id_periodo' => array('name' => 'id_periodo', 'type' => 'xsd:int'),
        'anno_fiscal' => array('name' => 'anno_fiscal', 'type' => 'xsd:string')
       )
    );
$server->wsdl->addComplexType('ListNationalities',
    'complexType',
    'struct',
    'all',
    '',
        array(
        'id_nacionalidad' => array('name' => 'id_nacionalidad', 'type' => 'xsd:int'),
        'nombre_pais' => array('name' => 'nombre_pais', 'type' => 'xsd:string'),
        'nacionalidad' => array('name' => 'nacionalidad', 'type' => 'xsd:string'),		
		'fecha_creacion' => array('name' => 'fecha_creacion', 'type' => 'xsd:string'),
		'id_usuario' => array('name' => 'id_usuario', 'type' => 'xsd:int')
       )
    );
$server->wsdl->addComplexType('ListPeriods',
    'complexType',
    'struct',
    'all',
    '',
        array(
        'id_periodo' => array('name' => 'id_periodo', 'type' => 'xsd:int'),
        'anno_fiscal' => array('name' => 'anno_fiscal', 'type' => 'xsd:string'),
        'frecuencia_pago' => array('name' => 'frecuencia_pago', 'type' => 'xsd:string'),
		'numero_control' => array('name' => 'numero_control', 'type' => 'xsd:string'),
		'numero_periodo' => array('name' => 'numero_periodo', 'type' => 'xsd:int'),
        'fecha_pago' => array('name' => 'fecha_pago', 'type' => 'xsd:string'),
        'fecha_inicio' => array('name' => 'fecha_inicio', 'type' => 'xsd:string'),
		'fecha_final' => array('name' => 'fecha_final', 'type' => 'xsd:string'),
        'secuencia_mensual' => array('name' => 'secuencia_mensual', 'type' => 'xsd:string'),
		'estatus' => array('name' => 'estatus', 'type' => 'xsd:int'),
        'fecha_creacion' => array('name' => 'fecha_creacion', 'type' => 'xsd:string'),
        'id_usuario' => array('name' => 'id_usuario', 'type' => 'xsd:int')
       )
    );
$server->wsdl->addComplexType('ListRoles',
    'complexType',
    'struct',
    'all',
    '',
        array(
        'id_rol' => array('name' => 'id_rol', 'type' => 'xsd:int'),
		'nombre_rol' => array('name' => 'nombre_rol', 'type' => 'xsd:string'),
        'descripcion' => array('name' => 'descripcion', 'type' => 'xsd:string'),
		'fecha_creacion' => array('name' => 'fecha_creacion', 'type' => 'xsd:string'),
		'id_usuario' => array('name' => 'id_usuario', 'type' => 'xsd:int')
       )
    );
$server->wsdl->addComplexType('ListSections',
    'complexType',
    'struct',
    'all',
    '',
        array(
        'id_seccion' => array('name' => 'id_seccion', 'type' => 'xsd:int'),
		'id_departamento' => array('name' => 'id_departamento', 'type' => 'xsd:int'),
		'nombre_departamento' => array('name' => 'nombre_departamento', 'type' => 'xsd:string'),
        'nombre_seccion' => array('name' => 'nombre_seccion', 'type' => 'xsd:string'),
		'codigo_seccion' => array('name' => 'codigo_seccion', 'type' => 'xsd:string'),
		'fecha_creacion' => array('name' => 'fecha_creacion', 'type' => 'xsd:string'),
		'id_usuario' => array('name' => 'id_usuario', 'type' => 'xsd:int')
       )
    );	
$server->wsdl->addComplexType('ListBloodType',
    'complexType',
    'struct',
    'all',
    '',
        array(
        'id_tipo_sangre' => array('name' => 'id_tipo_sangre', 'type' => 'xsd:int'),
		'tipo_sangre' => array('name' => 'tipo_sangre', 'type' => 'xsd:string'),
		'fecha_creacion' => array('name' => 'fecha_creacion', 'type' => 'xsd:string'),
		'id_usuario' => array('name' => 'id_usuario', 'type' => 'xsd:int')
       )
    );	
$server->wsdl->addComplexType('ListTurn',
    'complexType',
    'struct',
    'all',
    '',
        array(
        'id_turno' => array('name' => 'id_turno', 'type' => 'xsd:int'),
		'turno' => array('name' => 'turno', 'type' => 'xsd:string'),
		'fecha_creacion' => array('name' => 'fecha_creacion', 'type' => 'xsd:string'),
		'id_usuario' => array('name' => 'id_usuario', 'type' => 'xsd:int')
       )
    );	
$server->wsdl->addComplexType('ListUsers',
    'complexType',
    'struct',
    'all',
    '',
        array(
        'id_usuario' => array('name' => 'id_usuario', 'type' => 'xsd:int'),
		'id_rol' => array('name' => 'id_rol', 'type' => 'xsd:int'),
		'id_estado_usuario' => array('name' => 'id_estado_usuario', 'type' => 'xsd:int'),
		'nombre_usuario' => array('name' => 'nombre_usuario', 'type' => 'xsd:string'),
       	'pwd' => array('name' => 'pwd', 'type' => 'xsd:string'),
		'nombre_rol' => array('name' => 'nombre_rol', 'type' => 'xsd:string'),
		'nombre_estado_usuario' => array('name' => 'nombre_estado_empleado', 'type' => 'xsd:string')
       )
    );
		
$server->wsdl->addComplexType('GetUser',
    'complexType',
    'struct',
    'all',
    '',
        array(
        'id_usuario' => array('name' => 'id_usuario', 'type' => 'xsd:int'),
		'id_rol' => array('name' => 'id_rol', 'type' => 'xsd:int'),
		'id_estado_usuario' => array('name' => 'id_estado_usuario', 'type' => 'xsd:int'),
		'nombre_usuario' => array('name' => 'nombre_usuario', 'type' => 'xsd:string'),
       	'pwd' => array('name' => 'pwd', 'type' => 'xsd:string'),
		'fecha_creacion' => array('name' => 'fecha_creacion', 'type' => 'xsd:string')
       ) 
    );	
$server->wsdl->addComplexType('GetMsg',
    'complexType',
    'struct',
    'all',
    '',
        array(
        'msg' => array('name' => 'msg', 'type' => 'xsd:string'),
		'id' => array('name' => 'id', 'type' => 'xsd:int')
       )
    );
$server->wsdl->addComplexType('ListSectionsDepartments',
    'complexType',
    'struct',
    'all',
    '',
        array(
        'id_seccion' => array('name' => 'id_seccion', 'type' => 'xsd:int'),
		'id_departamento' => array('name' => 'id_departamento', 'type' => 'xsd:int'),
		'nombre_seccion' => array('name' => 'nombre_seccion', 'type' => 'xsd:string'),
		'nombre_departamento' => array('name' => 'nombre_departamento', 'type' => 'xsd:string'),
       	'codigo_seccion' => array('name' => 'codigo_seccion', 'type' => 'xsd:string')
       )
    );
$server->wsdl->addComplexType('ListRecordsEmployees',
    'complexType',
    'struct',
    'all',
    '',
        array(
        'id_registro_transaccion_empleado' => array('name' => 'id_registro_transaccion_empleado', 'type' => 'xsd:int'),
		'id_empleado' => array('name' => 'id_empleado', 'type' => 'xsd:int'),
		'id_periodo' => array('name' => 'id_periodo', 'type' => 'xsd:int'),
		'horas_regular' => array('name' => 'horas_regular', 'type' => 'xsd:string'),
		'horas_domingo' => array('name' => 'horas_domingo', 'type' => 'xsd:string'),
       	'horas_feriado' => array('name' => 'horas_feriado', 'type' => 'xsd:string'),
		'horas_compensatorio' => array('name' => 'horas_compensatorio', 'type' => 'xsd:string'),
		'horas_extra1' => array('name' => 'horas_extra1', 'type' => 'xsd:string'),
       	'horas_extra2' => array('name' => 'horas_extra2', 'type' => 'xsd:string'),
		'horas_extra3' => array('name' => 'horas_extra3', 'type' => 'xsd:string'),
		'horas_extra4' => array('name' => 'horas_extra4', 'type' => 'xsd:string'),
       	'horas_extra5' => array('name' => 'horas_extra5', 'type' => 'xsd:string'),
		'horas_extra6' => array('name' => 'horas_extra6', 'type' => 'xsd:string'),
		'horas_extra7' => array('name' => 'horas_extra7', 'type' => 'xsd:string'),
       	'horas_extra8' => array('name' => 'horas_extra8', 'type' => 'xsd:string'),
		'horas_extra9' => array('name' => 'horas_extra9', 'type' => 'xsd:string'),
       	'horas_extra10' => array('name' => 'horas_extra10', 'type' => 'xsd:string'),
		'factor_reg' => array('name' => 'factor_reg', 'type' => 'xsd:string'),
		'factor_dom' => array('name' => 'factor_dom', 'type' => 'xsd:string'),
       	'factor_fer' => array('name' => 'factor_fer', 'type' => 'xsd:string'),
		'factor_com' => array('name' => 'factor_com', 'type' => 'xsd:string'),
		'factor1' => array('name' => 'factor1', 'type' => 'xsd:string'),
       	'factor2' => array('name' => 'factor2', 'type' => 'xsd:string'),
		'factor3' => array('name' => 'factor3', 'type' => 'xsd:string'),
		'factor4' => array('name' => 'factor4', 'type' => 'xsd:string'),
       	'factor5' => array('name' => 'factor5', 'type' => 'xsd:string'),
		'factor6' => array('name' => 'factor6', 'type' => 'xsd:string'),
		'factor7' => array('name' => 'factor7', 'type' => 'xsd:string'),
       	'factor8' => array('name' => 'factor8', 'type' => 'xsd:string'),
		'factor9' => array('name' => 'factor9', 'type' => 'xsd:string'),
       	'factor10' => array('name' => 'factor10', 'type' => 'xsd:string'),
		'horas_enferm' => array('name' => 'horas_enferm', 'type' => 'xsd:string'),
		'horas_ajuste' => array('name' => 'horas_ajuste', 'type' => 'xsd:string'),
		'horas_ausen' => array('name' => 'horas_ausen', 'type' => 'xsd:string'),
       	'horas_certmedic' => array('name' => 'horas_certmedic', 'type' => 'xsd:string'),
		'adelanto_vacaciones' => array('name' => 'adelanto_vacaciones', 'type' => 'xsd:string')
       )
    );	
	
	
	
$server->wsdl->addComplexType('ViewInformeBankEmployees',
    'complexType',
    'struct',
    'all',
    '',
        array(
        'id_talonario_empleado'=>array('name'=>'id_talonario_empleado','type'=>'xsd:int'),
		'id_empleado'=>array('name'=>'id_empleado','type'=>'xsd:int'),
		'numero_empleado'=>array('name'=>'numero_empleado','type'=>'xsd:string'),
		'id_periodo'=>array('name'=>'id_periodo','type'=>'xsd:int'),
		'id_seccion'=>array('name'=>'id_seccion','type'=>'xsd:int'),
		'nombre_seccion'=>array('name'=>'nombre_seccion','type'=>'xsd:string'),
		'nombre_departamento'=>array('name'=>'nombre_departamento','type'=>'xsd:string'),
		'nombre_empleado'=>array('name'=>'nombre_empleado','type'=>'xsd:string'),
		'apellido_empleado'=>array('name'=>'apellido_empleado','type'=>'xsd:string'),
		'cedula_empleado'=>array('name'=>'cedula_empleado','type'=>'xsd:string'),
		'id_empresa'=>array('name'=>'id_empresa','type'=>'xsd:int'),
		'nombre_empresa'=>array('name'=>'nombre_empresa','type'=>'xsd:string'),
		'horas_regular'=>array('name'=>'horas_regular','type'=>'xsd:string'),
		'horas_domingo'=>array('name'=>'horas_domingo','type'=>'xsd:string'),
		'horas_feriado'=>array('name'=>'horas_feriado','type'=>'xsd:string'),
		'horas_compensatorio'=>array('name'=>'horas_compensatorio','type'=>'xsd:string'),
		'horas_extra1'=>array('name'=>'horas_extra1','type'=>'xsd:string'),
		'horas_extra2'=>array('name'=>'horas_extra2','type'=>'xsd:string'),
		'horas_extra3'=>array('name'=>'horas_extra3','type'=>'xsd:string'),
		'horas_extra4'=>array('name'=>'horas_extra4','type'=>'xsd:string'),
		'horas_extra5'=>array('name'=>'horas_extra5','type'=>'xsd:string'),
		'horas_extra6'=>array('name'=>'horas_extra6','type'=>'xsd:string'),
		'horas_extra7'=>array('name'=>'horas_extra7','type'=>'xsd:string'),
		'horas_extra8'=>array('name'=>'horas_extra8','type'=>'xsd:string'),
		'horas_extra9'=>array('name'=>'horas_extra9','type'=>'xsd:string'),
		'horas_extra10'=>array('name'=>'horas_extra10','type'=>'xsd:string'),
		'factor_reg'=>array('name'=>'factor_reg','type'=>'xsd:string'),
		'factor_dom'=>array('name'=>'factor_dom','type'=>'xsd:string'),
		'factor_fer'=>array('name'=>'factor_fer','type'=>'xsd:string'),
		'factor_com'=>array('name'=>'factor_com','type'=>'xsd:string'),
		'factor1'=>array('name'=>'factor1','type'=>'xsd:string'),
		'factor2'=>array('name'=>'factor2','type'=>'xsd:string'),
		'factor3'=>array('name'=>'factor3','type'=>'xsd:string'),
		'factor4'=>array('name'=>'factor4','type'=>'xsd:string'),
		'factor5'=>array('name'=>'factor5','type'=>'xsd:string'),
		'factor6'=>array('name'=>'factor6','type'=>'xsd:string'),
		'factor7'=>array('name'=>'factor7','type'=>'xsd:string'),
		'factor8'=>array('name'=>'factor8','type'=>'xsd:string'),
		'factor9'=>array('name'=>'factor9','type'=>'xsd:string'),
		'factor10'=>array('name'=>'factor10','type'=>'xsd:string'),
		'horas_enferm'=>array('name'=>'horas_enferm','type'=>'xsd:string'),
		'horas_ajuste'=>array('name'=>'horas_ajuste','type'=>'xsd:string'),
		'horas_ausen'=>array('name'=>'horas_ausen','type'=>'xsd:string'),
		'rataxhora'=>array('name'=>'rataxhora','type'=>'xsd:string'),
		'claveir'=>array('name'=>'claveir','type'=>'xsd:string'),
		'seg_soc'=>array('name'=>'seg_soc','type'=>'xsd:string'),
		'seg_edu'=>array('name'=>'seg_edu','type'=>'xsd:string'),
		'isr'=>array('name'=>'isr','type'=>'xsd:string'),
		'cod1'=>array('name'=>'cod1','type'=>'xsd:string'),
		'cod2'=>array('name'=>'cod2','type'=>'xsd:string'),
		'cod3'=>array('name'=>'cod3','type'=>'xsd:string'),
		'cod4'=>array('name'=>'cod4','type'=>'xsd:string'),
		'cod5'=>array('name'=>'cod5','type'=>'xsd:string'),
		'cod6'=>array('name'=>'cod6','type'=>'xsd:string'),
		'cod7'=>array('name'=>'cod7','type'=>'xsd:string'),
		'cod8'=>array('name'=>'cod8','type'=>'xsd:string'),
		'cod9'=>array('name'=>'cod9','type'=>'xsd:string'),
		'cod10'=>array('name'=>'cod10','type'=>'xsd:string'),
		'monto1'=>array('name'=>'monto1','type'=>'xsd:string'),
		'monto2'=>array('name'=>'monto2','type'=>'xsd:string'),
		'monto3'=>array('name'=>'monto3','type'=>'xsd:string'),
		'monto4'=>array('name'=>'monto4','type'=>'xsd:string'),
		'monto5'=>array('name'=>'monto5','type'=>'xsd:string'),
		'monto6'=>array('name'=>'monto6','type'=>'xsd:string'),
		'monto7'=>array('name'=>'monto7','type'=>'xsd:string'),
		'monto8'=>array('name'=>'monto8','type'=>'xsd:string'),
		'monto9'=>array('name'=>'monto9','type'=>'xsd:string'),
		'monto10'=>array('name'=>'monto10','type'=>'xsd:string'),
		'monto_pend1'=>array('name'=>'monto_pend1','type'=>'xsd:string'),
		'monto_pend2'=>array('name'=>'monto_pend2','type'=>'xsd:string'),
		'monto_pend3'=>array('name'=>'monto_pend3','type'=>'xsd:string'),
		'monto_pend4'=>array('name'=>'monto_pend4','type'=>'xsd:string'),
		'monto_pend5'=>array('name'=>'monto_pend5','type'=>'xsd:string'),
		'monto_pend6'=>array('name'=>'monto_pend6','type'=>'xsd:string'),
		'monto_pend7'=>array('name'=>'monto_pend7','type'=>'xsd:string'),
		'monto_pend8'=>array('name'=>'monto_pend8','type'=>'xsd:string'),
		'monto_pend9'=>array('name'=>'monto_pend9','type'=>'xsd:string'),
		'monto_pend10'=>array('name'=>'monto_pend10','type'=>'xsd:string'),
		'numero_comprobante'=>array('name'=>'numero_comprobante','type'=>'xsd:string'),
		'sal_deve_vacaciones'=>array('name'=>'sal_deve_vacaciones','type'=>'xsd:string'),
		'sal_deve_xiiimes'=>array('name'=>'sal_deve_xiiimes','type'=>'xsd:string'),
		'acu_pago_vacaciones'=>array('name'=>'acu_pago_vacaciones','type'=>'xsd:string'),
		'acu_pago_xiiimes'=>array('name'=>'acu_pago_xiiimes','type'=>'xsd:string'),
		'numero_cuenta'=>array('name'=>'numero_cuenta','type'=>'xsd:string'),
		'id_tipo_cuenta' => array('name' => 'id_tipo_cuenta', 'type' => 'xsd:int'),
        'id_banco' => array('name' => 'id_banco', 'type' => 'xsd:int'),
		'valor_regular'=>array('name'=>'valor_regular','type'=>'xsd:string'),
		'valor_domingo'=>array('name'=>'valor_domingo','type'=>'xsd:string'),
		'valor_feriado'=>array('name'=>'valor_feriado','type'=>'xsd:string'),
		'valor_compensatorio'=>array('name'=>'valor_compensatorio','type'=>'xsd:string'),
		'valor_extra1'=>array('name'=>'valor_extra1','type'=>'xsd:string'),
		'valor_extra2'=>array('name'=>'valor_extra2','type'=>'xsd:string'),
		'valor_extra3'=>array('name'=>'valor_extra3','type'=>'xsd:string'),
		'valor_extra4'=>array('name'=>'valor_extra4','type'=>'xsd:string'),
		'valor_extra5'=>array('name'=>'valor_extra5','type'=>'xsd:string'),
		'valor_extra6'=>array('name'=>'valor_extra6','type'=>'xsd:string'),
		'valor_extra7'=>array('name'=>'valor_extra7','type'=>'xsd:string'),
		'valor_extra8'=>array('name'=>'valor_extra8','type'=>'xsd:string'),
		'valor_extra9'=>array('name'=>'valor_extra9','type'=>'xsd:string'),
		'valor_extra10'=>array('name'=>'valor_extra10','type'=>'xsd:string'),
		'valor_extra'=>array('name'=>'valor_extra','type'=>'xsd:string'),
		'total_ingresos'=>array('name'=>'total_ingresos','type'=>'xsd:string'),
		'total_descuentos'=>array('name'=>'total_descuentos','type'=>'xsd:string'),
		'salario_neto'=>array('name'=>'salario_neto','type'=>'xsd:string')
       )
    );
/*************************************************************************************************************************************************************************************/	
$server->wsdl->addComplexType('return_GetBanks',
    'complexType',
    'array',
    'all',
    'SOAP-ENC:Array',
    array(),
    array(
    array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:ListBanks[]')
    ),
    'tns:ListBanks'
    );
$server->wsdl->addComplexType('return_GetPositions',
    'complexType',
    'array',
    'all',
    'SOAP-ENC:Array',
    array(),
    array(
    array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:ListPositions[]')
    ),
    'tns:ListPositions'
    );
$server->wsdl->addComplexType('return_GetBankAccount',
    'complexType',
    'array',
    'all',
    'SOAP-ENC:Array',
    array(),
    array(
    array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:ListBankAccount[]')
    ),
    'tns:ListBankAccount'
    );
$server->wsdl->addComplexType('return_GetDepartments',
    'complexType',
    'array',
    'all',
    'SOAP-ENC:Array',
    array(),
    array(
    array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:ListDepartments[]')
    ),
    'tns:ListDepartments'
    );
$server->wsdl->addComplexType('return_GetDiscountsIncome',
    'complexType',
    'array',
    'all',
    'SOAP-ENC:Array',
    array(),
    array(
    array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:ListDiscountsIncome[]')
    ),
    'tns:ListDiscountsIncome'
    );
$server->wsdl->addComplexType('return_GetDiscountsIncomeEmployees',
    'complexType',
    'array',
    'all',
    'SOAP-ENC:Array',
    array(),
    array(
    array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:ListDiscountsIncomeEmployees[]')
    ),
    'tns:ListDiscountsIncomeEmployees'
    );
$server->wsdl->addComplexType('return_GetDayHolidays',
    'complexType',
    'array',
    'all',
    'SOAP-ENC:Array',
    array(),
    array(
    array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:ListDayHolidays[]')
    ),
    'tns:ListDayHolidays'
    );	
$server->wsdl->addComplexType('return_GetEmployees',
    'complexType',
    'array',
    'all',
    'SOAP-ENC:Array',
    array(),
    array(
    array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:ListEmployees[]')
    ),
    'tns:ListEmployees'
    );	
$server->wsdl->addComplexType('return_GetCompanies',
    'complexType',
    'array',
    'all',
    'SOAP-ENC:Array',
    array(),
    array(
    array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:ListCompanies[]')
    ),
    'tns:ListCompanies'
    );
$server->wsdl->addComplexType('return_GetStatesCivil',
    'complexType',
    'array',
    'all',
    'SOAP-ENC:Array',
    array(),
    array(
    array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:ListStatesCivil[]')
    ),
    'tns:ListStatesCivil'
    );
$server->wsdl->addComplexType('return_GetStatesEmployees',
    'complexType',
    'array',
    'all',
    'SOAP-ENC:Array',
    array(),
    array(
    array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:ListStatesEmployees[]')
    ),
    'tns:ListStatesEmployees'
    );
$server->wsdl->addComplexType('return_GetStatesUsers',
    'complexType',
    'array',
    'all',
    'SOAP-ENC:Array',
    array(),
    array(
    array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:ListStatesUsers[]')
    ),
    'tns:ListStatesUsers'
    );
$server->wsdl->addComplexType('return_GetGenders',
    'complexType',
    'array',
    'all',
    'SOAP-ENC:Array',
    array(),
    array(
    array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:ListGenders[]')
    ),
    'tns:ListGenders'
    );
$server->wsdl->addComplexType('return_GetLegalTaxes',
    'complexType',
    'array',
    'all',
    'SOAP-ENC:Array',
    array(),
    array(
    array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:ListLegalTaxes[]')
    ),
    'tns:ListLegalTaxes'
    );
$server->wsdl->addComplexType('return_GetLegalTaxesEmployees',
    'complexType',
    'array',
    'all',
    'SOAP-ENC:Array',
    array(),
    array(
    array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:ListLegalTaxesEmployees[]')
    ),
    'tns:ListLegalTaxesEmployees'
    );	
$server->wsdl->addComplexType('return_GetWorkingDays',
    'complexType',
    'array',
    'all',
    'SOAP-ENC:Array',
    array(),
    array(
    array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:ListWorkingDays[]')
    ),
    'tns:ListWorkingDays'
    );
$server->wsdl->addComplexType('return_GetWorkingDaysEmployees',
    'complexType',
    'array',
    'all',
    'SOAP-ENC:Array',
    array(),
    array(
    array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:ListWorkingDaysEmployees[]')
    ),
    'tns:ListWorkingDaysEmployees'
    );
$server->wsdl->addComplexType('return_GetNationalities',
    'complexType',
    'array',
    'all',
    'SOAP-ENC:Array',
    array(),
    array(
    array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:ListNationalities[]')
    ),
    'tns:ListNationalities'
    );
$server->wsdl->addComplexType('return_GetPeriods',
    'complexType',
    'array',
    'all',
    'SOAP-ENC:Array',
    array(),
    array(
    array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:ListPeriods[]')
    ),
    'tns:ListPeriods'
    );
$server->wsdl->addComplexType('return_GetRoles',
    'complexType',
    'array',
    'all',
    'SOAP-ENC:Array',
    array(),
    array(
    array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:ListRoles[]')
    ),
    'tns:ListRoles'
    );
$server->wsdl->addComplexType('return_GetSections',
    'complexType',
    'array',
    'all',
    'SOAP-ENC:Array',
    array(),
    array(
    array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:ListSections[]')
    ),
    'tns:ListSections'
    );
$server->wsdl->addComplexType('return_GetBloodType',
    'complexType',
    'array',
    'all',
    'SOAP-ENC:Array',
    array(),
    array(
    array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:ListBloodType[]')
    ),
    'tns:ListBloodType'
    );
$server->wsdl->addComplexType('return_GetTurn',
    'complexType',
    'array',
    'all',
    'SOAP-ENC:Array',
    array(),
    array(
    array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:ListTurn[]')
    ),
    'tns:ListTurn'
    );
$server->wsdl->addComplexType('return_GetUsers',
    'complexType',
    'array',
    'all',
    'SOAP-ENC:Array',
    array(),
    array(
    array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:ListUsers[]')
    ),
    'tns:ListUsers'
    );
$server->wsdl->addComplexType('return_GetUser',
    'complexType',
    'array',
    'all',
    'SOAP-ENC:Array',
    array(),
    array(
    array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:GetUser[]')
    ),
    'tns:GetUser'
    );	
$server->wsdl->addComplexType('return_GetMsg',
    'complexType',
    'array',
    'all',
    'SOAP-ENC:Array',
    array(),
    array(
    array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:GetMsg[]')
    ),
    'tns:GetMsg'
    );
$server->wsdl->addComplexType('return_GetSectionsDepartments',
    'complexType',
    'array',
    'all',
    'SOAP-ENC:Array',
    array(),
    array(
    array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:ListSectionsDepartments[]')
    ),
    'tns:ListSectionsDepartments'
    );
$server->wsdl->addComplexType('return_GetRecordsEmployees',
    'complexType',
    'array',
    'all',
    'SOAP-ENC:Array',
    array(),
    array(
    array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:ListRecordsEmployees[]')
    ),
    'tns:ListRecordsEmployees'
    );

$server->wsdl->addComplexType('return_ViewInformeBankEmployees',
    'complexType',
    'array',
    'all',
    'SOAP-ENC:Array',
    array(),
    array(
    array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:ViewInformeBankEmployees[]')
    ),
    'tns:ViewInformeBankEmployees'
    );
	
	
	
	
/*************************************************************************************************************************************************************************************/	
//Register GetAllBanks function
$server->register('GetAllBanks',
    array(),	
    array('return' => 'tns:return_GetBanks'),
    $ns,
    $ns.'#GetAllBanks',
    'rpc',
    'encoded',
    ''
    );	
//Register GetAllPositions function
$server->register('GetAllPositions',
    array(),	
    array('return' => 'tns:return_GetPositions'),
    $ns,
    $ns.'#GetAllPositions',
    'rpc',
    'encoded',
    ''
    );
//Register GetAllBankAccount function
$server->register('GetAllBankAccount',
    array(),	
    array('return' => 'tns:return_GetBankAccount'),
    $ns,
    $ns.'#GetAllBankAccount',
    'rpc',
    'encoded',
    ''
    );
//Register GetAllDepartments function
$server->register('GetAllDepartments',
    array(),	
    array('return' => 'tns:return_GetDepartments'),
    $ns,
    $ns.'#GetAllDepartments',
    'rpc',
    'encoded',
    ''
    );
//Register GetAllDiscountsIncome function 
$server->register('GetAllDiscountsIncome',
    array(),	
    array('return' => 'tns:return_GetDiscountsIncome'),
    $ns,
    $ns.'#GetAllDiscountsIncome',
    'rpc',
    'encoded',
    ''
    );
//Register GetAllDiscountsIncomeEmployees function 
$server->register('GetAllDiscountsIncomeEmployees',
    array(),	
    array('return' => 'tns:return_GetDiscountsIncomeEmployees'),
    $ns,
    $ns.'#GetAllDiscountsIncomeEmployees',
    'rpc',
    'encoded',
    ''
    );
//Register GetAllDayHolidays function
$server->register('GetAllDayHolidays',
    array(),	
    array('return' => 'tns:return_GetDayHolidays'),
    $ns,
    $ns.'#GetAllDayHolidays',
    'rpc',
    'encoded',
    ''
    );
//Register GetAllEmployees function
$server->register('GetAllEmployees',
    array(),	
    array('return' => 'tns:return_GetEmployees'),
    $ns,
    $ns.'#GetAllEmployees',
    'rpc',
    'encoded',
    ''
    );
//Register GetAllCompanies function
$server->register('GetAllCompanies',
    array(),	
    array('return' => 'tns:return_GetCompanies'),
    $ns,
    $ns.'#GetAllCompanies',
    'rpc',
    'encoded',
    ''
    );	
//Register GetAllStatesCivil function
$server->register('GetAllStatesCivil',
    array(),	
    array('return' => 'tns:return_GetStatesCivil'),
    $ns,
    $ns.'#GetAllStatesCivil',
    'rpc',
    'encoded',
    ''
    );	
//Register GetAllStatesEmployees function
$server->register('GetAllStatesEmployees',
    array(),	
    array('return' => 'tns:return_GetStatesEmployees'),
    $ns,
    $ns.'#GetAllStatesEmployees',
    'rpc',
    'encoded',
    ''
    );	
//Register GetAllStatesUsers function
$server->register('GetAllStatesUsers',
    array(),	
    array('return' => 'tns:return_GetStatesUsers'),
    $ns,
    $ns.'#GetAllStatesUsers',
    'rpc',
    'encoded',
    ''
    );
//Register GetAllGenders function
$server->register('GetAllGenders',
    array(),	
    array('return' => 'tns:return_GetGenders'),
    $ns,
    $ns.'#GetAllGenders',
    'rpc',
    'encoded',
    ''
    );
//Register GetAllLegalTaxes function
$server->register('GetAllLegalTaxes',
    array(),	
    array('return' => 'tns:return_GetLegalTaxes'),
    $ns,
    $ns.'#GetAllLegalTaxes',
    'rpc',
    'encoded',
    ''
    );		
//Register GetAllWorkingDays function
$server->register('GetAllWorkingDays',
    array(),	
    array('return' => 'tns:return_GetWorkingDays'),
    $ns,
    $ns.'#GetAllWorkingDays',
    'rpc',
    'encoded',
    ''
    );
//Register GetAllWorkingDaysEmployees function
$server->register('GetAllWorkingDaysEmployees',
    array(),	
    array('return' => 'tns:return_GetWorkingDaysEmployees'),
    $ns,
    $ns.'#GetAllWorkingDaysEmployees',
    'rpc',
    'encoded',
    ''
    );
//Register GetAllNationalities function
$server->register('GetAllNationalities',
    array(),	
    array('return' => 'tns:return_GetNationalities'),
    $ns,
    $ns.'#GetAllNationalities',
    'rpc',
    'encoded',
    ''
    );
//Register GetAllPeriods function
$server->register('GetAllPeriods',
    array(),	
    array('return' => 'tns:return_GetPeriods'),
    $ns,
    $ns.'#GetAllPeriods',
    'rpc',
    'encoded',
    ''
    );
//Register GetAllRoles function
$server->register('GetAllRoles',
    array(),	
    array('return' => 'tns:return_GetRoles'),
    $ns,
    $ns.'#GetAllRoles',
    'rpc',
    'encoded',
    ''
    );
//Register GetAllSections function
$server->register('GetAllSections',
    array(),	
    array('return' => 'tns:return_GetSections'),
    $ns,
    $ns.'#GetAllSections',
    'rpc',
    'encoded',
    ''
    );
//Register GetAllBloodType function
$server->register('GetAllBloodType',
    array(),	
    array('return' => 'tns:return_GetBloodType'),
    $ns,
    $ns.'#GetAllBloodType',
    'rpc',
    'encoded',
    ''
    );
//Register GetAllTurn function
$server->register('GetAllTurn',
    array(),	
    array('return' => 'tns:return_GetTurn'),
    $ns,
    $ns.'#GetAllTurn',
    'rpc',
    'encoded',
    ''
    );
//Register GetAllUsers function
$server->register('GetAllUsers',
    array(),	
    array('return' => 'tns:return_GetUsers'),
    $ns,
    $ns.'#GetAllUsers',
    'rpc',
    'encoded',
    ''
    );
//Register GetAllSectionsDepartments function 
$server->register('GetAllSectionsDepartments',
    array(),	
    array('return' => 'tns:return_GetSectionsDepartments'),
    $ns,
    $ns.'#GetAllSectionsDepartments',
    'rpc',
    'encoded',
    ''
    );	

//Register AddBank function
$server->register('AddBank',
    array('nombre_banco' => 'xsd:string','id_usuario' => 'xsd:int'),	
	array('return' => 'tns:return_GetMsgs'),
    $ns,
    $ns.'#AddBank',
    'rpc',
    'encoded',
    ''
    );
//Register AddPosition function
$server->register('AddPosition',
    array('nombre_cargo' => 'xsd:string','codigo_cargo' => 'xsd:string','id_usuario' => 'xsd:int'),	
	array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#AddPosition',
    'rpc',
    'encoded',
    ''
    );
//Register AddBankAccount function 
$server->register('AddBankAccount',
    array('id_empleado' => 'xsd:int','numero_empleado' => 'xsd:string','numero_cuenta' => 'xsd:string','id_tipo_cuenta' => 'xsd:int','nombre_tipo_cuenta' => 'xsd:string','tipo_tranferencia' => 'xsd:string','id_banco' => 'xsd:int'),	
	array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#AddBankAccount',
    'rpc',
    'encoded',
    ''
    );
//Register AddDepartment function 
$server->register('AddDepartment',
    array('nombre_departamento' => 'xsd:string','codigo_departamento' => 'xsd:string','id_usuario' => 'xsd:int'),	
    array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#AddDepartment',
    'rpc',
    'encoded',
    ''
    );
//Register AddDiscountsIncome function 
$server->register('AddDiscountsIncome',
    array('cod_descuento_ingreso' => 'xsd:string','nombre_descuento_ingreso' => 'xsd:string','tipo' => 'xsd:string','numero_cuenta' => 'xsd:string','id_usuario' => 'xsd:int'),	
    array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#AddDiscountsIncome',
    'rpc',
    'encoded',
    ''
    );
//Register AddDiscountsIncomeEmployee function
$server->register('AddDiscountsIncomeEmployee',
    array('numero_cliente' =>'xsd:string','numero_cuenta' => 'xsd:string','numero_empleado' => 'xsd:string',
		'id_empleado' => 'xsd:int','id_descuento_ingreso' => 'xsd:int','monto_mes' => 'xsd:string','monto_periodo' => 'xsd:string',
		'afecta_diciembre' => 'xsd:string','prioridad' => 'xsd:string','tipo'=> 'xsd:string',
		'frecuencia' => 'xsd:string','monto_urgente' =>'xsd:string','monto_original' =>'xsd:string','monto_pendiente' =>'xsd:string','estado' =>'xsd:int' ,'referencia' =>'xsd:string', 'id_periodo' => 'xsd:int',
		'id_usuario' => 'xsd:int'),
    array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#AddDiscountsIncomeEmployee',
    'rpc',
    'encoded',
    ''
    );
//Register AddDiscountsIncomeEmployeeDetail function
$server->register('AddDiscountsIncomeEmployeeDetail',
    array('id_descuento_ingreso_empleado' => 'xsd:int','monto_mes' => 'xsd:string','monto_periodo' => 'xsd:string',
	'monto_original' =>'xsd:string','monto_pendiente' =>'xsd:string','estado' =>'xsd:int','id_periodo' => 'xsd:int',
		'id_usuario' => 'xsd:int'),
    array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#AddDiscountsIncomeEmployeeDetail',
    'rpc',
    'encoded',
    ''
    );
//Register AddDayHoliday function 
$server->register('AddDayHoliday',
    array('fecha_dia_feriado' => 'xsd:string','celebracion' => 'xsd:string','id_usuario' => 'xsd:int'),	
    array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#AddDayHoliday',
    'rpc',
    'encoded',
    ''
    );		
//Register AddEmployee function
$server->register('AddEmployee',
    array('numero_empleado' =>'xsd:string','cedula' => 'xsd:string','seguro_social' => 'xsd:string',
		'apellido' => 'xsd:string','nombre' =>	'xsd:string','id_genero' => 'xsd:int','id_nacionalidad' => 'xsd:int',
		'id_estado_civil' => 'xsd:int','fecha_nacimiento' => 'xsd:string','tipo_de_sangre'=> 'xsd:string',
		'id_estado_empleado' => 'xsd:int','id_seccion' =>'xsd:int','id_cargo' =>'xsd:int', 
		'horas_x_periodo' => 'xsd:string','rata_x_hora' => 'xsd:string','salario' => 'xsd:string', 
		'fecha_vence_contrato' => 'xsd:string','fecha_venc_carnet' => 'xsd:string','pago_efectivo' => 'xsd:int', 
		'sindicato' => 'xsd:int','clave_renta' =>'xsd:string','forma_pago' => 'xsd:string',
		'frecuencia_pago' => 'xsd:string','fecha_ingreso' =>'xsd:string','fecha_prox_vacaciones' => 'xsd:string',
		'fecha_terminacion '=> 'xsd:string','isr_gasto' =>'xsd:int','id_empresa' => 'xsd:int'),
    array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#AddEmployee',
    'rpc',
    'encoded',
    ''
    );	
//Register AddCompany function
$server->register('AddCompany',
    array('nombre_empresa' => 'xsd:string','representante_legal' => 'xsd:string','direccion' => 'xsd:string','apartado_postal' => 'xsd:string','comentario' => 'xsd:string','telefono_1' => 'xsd:string','codigo_actividad' => 'xsd:int'),	
    array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#AddCompany',
    'rpc',
    'encoded',
    ''
    );
//Register AddStateCivil function 
$server->register('AddStateCivil',
    array('nombre_estado_civil' => 'xsd:string','id_usuario' => 'xsd:int'),	
    array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#AddStateCivil',
    'rpc',
    'encoded',
    ''
    );
//Register AddStateEmployee function 
$server->register('AddStateEmployee',
    array('nombre_estado_empleado' => 'xsd:string','descripcion' => 'xsd:string','id_usuario' => 'xsd:int'),	
    array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#AddStateEmployee',
    'rpc',
    'encoded',
    ''
    );
//Register AddStateUser function 
$server->register('AddStateUser',
    array('nombre_estado_usuario' => 'xsd:string','descripcion' => 'xsd:string','id_usuario' => 'xsd:int'),	
    array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#AddStateUser',
    'rpc',
    'encoded',
    ''
    );	
//Register AddGender function 
$server->register('AddGender',
    array('nombre_genero' => 'xsd:string','id_usuario' => 'xsd:int'),	
    array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#AddGender',
    'rpc',
    'encoded',
    ''
    );
//Register AddLegalTax function 
$server->register('AddLegalTax',
    array('segsoc' => 'xsd:string','segedu' => 'xsd:string','isr' => 'xsd:string','porcentaje_segsoc' => 'xsd:string','porcentaje_segedu' => 'xsd:string','porcentaje_isr' => 'xsd:string','estado' => 'xsd:int','id_usuario' => 'xsd:int'),	
    array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#AddLegalTax',
    'rpc',
    'encoded',
    ''
    );
//Register AddLegalTaxEmployee function 
$server->register('AddLegalTaxEmployee', 
    array('id_empleado' => 'xsd:int','numero_empleado' => 'xsd:string','monto_ss' => 'xsd:string','monto_se' => 'xsd:string','monto_isr' => 'xsd:string','id_periodo' => 'xsd:int','id_impuesto_legal' => 'xsd:int'),	
    array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#AddLegalTaxEmployee',
    'rpc',
    'encoded',
    ''
    );
//Register AddAllLegalTaxEmployee function 
/*$server->register('AddAllLegalTaxEmployee', 
    array('insData' => 'tns:ListLegalTaxeEmployee'),	
    array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#AddAllLegalTaxEmployee',
    'rpc',
    'encoded',
    ''
    );*/	
	
//Register AddWorkingDay function
$server->register('AddWorkingDay', 
    array('codigo_jornada'=> 'xsd:string', 'id_turno' => 'xsd:int','turno' => 'xsd:string','descripcion' => 'xsd:string','hora_inicia' => 'xsd:string','hora_termina' => 'xsd:string','total_horas' => 'xsd:string','paga' => 'xsd:string','id_usuario' => 'xsd:int'),	
    array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#AddWorkingDay',
    'rpc',
    'encoded',
    ''
    );
//Register AddWorkingDayEmployee function
$server->register('AddWorkingDayEmployee', 
    array('id_empleado' => 'xsd:int','numero_empleado' => 'xsd:string','fecha' => 'xsd:string','dia' => 'xsd:string',
	'laboro' => 'xsd:int','ausencia' => 'xsd:string','tipo' => 'xsd:string','codigo' => 'xsd:string',
	'codigo_jornada' => 'xsd:string','com' => 'xsd:string','hora_entra' => 'xsd:string','hora_sale' => 'xsd:string',
	'horas_regulares' => 'xsd:string','horas_extras' => 'xsd:string','id_periodo' => 'xsd:int','anno_fiscal' => 'xsd:string'),	
    array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#AddWorkingDayEmployee',
    'rpc',
    'encoded',
    ''
    );
//Register AddNationality function
$server->register('AddNationality',
    array('nombre_pais' => 'xsd:string','nacionalidad' => 'xsd:string','id_usuario' => 'xsd:int'),	
	array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#AddNationality',
    'rpc',
    'encoded',
    ''
    );
//Register AddPeriod function 
$server->register('AddPeriod',
    array('anno_fiscal' => 'xsd:string','frecuencia_pago' => 'xsd:string','numero_control' => 'xsd:string','numero_periodo' => 'xsd:int','fecha_pago' => 'xsd:string','fecha_inicio' => 'xsd:string','fecha_final' => 'xsd:string','secuencia_mensual' => 'xsd:string','estatus' => 'xsd:int','id_usuario' => 'xsd:int'),	
	array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#AddPeriod',
    'rpc',
    'encoded',
    ''
    );
//Register AddEmployeeRecordTransaction function
$server->register('AddEmployeeRecordTransaction',
    array('id_empleado' =>'xsd:int', 'id_periodo' => 'xsd:int',
		 'horas_regular' =>'xsd:string', 'horas_domingo' => 'xsd:string', 
		  'horas_feriado' =>'xsd:string', 'horas_compensatorio' => 'xsd:string',
		  'horas_extra1' => 'xsd:string','horas_extra2' => 'xsd:string', 'horas_extra3' => 'xsd:string', 'horas_extra4' => 'xsd:string', 'horas_extra5' => 'xsd:string',
		  'horas_extra6' =>'xsd:string','horas_extra7' => 'xsd:string', 'horas_extra8' => 'xsd:string', 'horas_extra9' => 'xsd:string', 'horas_extra10' => 'xsd:string',
		  'factor_reg' => 'xsd:string','factor_dom' => 'xsd:string', 'factor_fer' =>'xsd:string', 'factor_com' => 'xsd:string', 
		  'factor1' => 'xsd:string', 'factor2' => 'xsd:string', 'factor3' => 'xsd:string', 'factor4' => 'xsd:string', 'factor5' => 'xsd:string',
		  'factor6' =>'xsd:string', 'factor7' => 'xsd:string', 'factor8' => 'xsd:string', 'factor9' => 'xsd:string', 'factor10' => 'xsd:string',
		   'horas_enferm' => 'xsd:string', 'horas_ajuste' =>'xsd:string', 'horas_ausen' => 'xsd:string', 'horas_certmedic' =>'xsd:string', 'adelanto_vacaciones' => 'xsd:string'),	
    array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#AddEmployeeRecordTransaction',
    'rpc',
    'encoded',
    ''
    );
//Register AddRol function
$server->register('AddRol',
    array('nombre_rol' => 'xsd:string','descripcion' => 'xsd:string','id_usuario' => 'xsd:int'),	
	array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#AddRol',
    'rpc',
    'encoded',
    ''
    );	
//Register AddSection function
$server->register('AddSection',
    array('id_departamento' => 'xsd:int','nombre_seccion' => 'xsd:string','codigo_seccion' => 'xsd:string','id_usuario' => 'xsd:int'),	
	array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#AddSection',
    'rpc',
    'encoded',
    ''
    );
//Register AddBloodType function
$server->register('AddBloodType',
    array('tipo_sangre' => 'xsd:string','id_usuario' => 'xsd:int'),	
	array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#AddBloodType',
    'rpc',
    'encoded',
    ''
    );
//Register AddTurn function
$server->register('AddTurn',
    array('turno' => 'xsd:string','id_usuario' => 'xsd:int'),	
	array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#AddTurn',
    'rpc',
    'encoded',
    ''
    );	
//Register AddUser function
$server->register('AddUser',
    array('id_rol' => 'xsd:int','nombre_usuario' => 'xsd:string','pwd' => 'xsd:string','id_estado_usuario' => 'xsd:int'),	
    array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#AddUser',
    'rpc',
    'encoded',
    ''
    );
//Register AddReceiptsEmployees function
$server->register('AddReceiptsEmployees',
    array('id_empresa' => 'xsd:int','id_periodo' => 'xsd:int'),	
    array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#AddReceiptsEmployees',
    'rpc',
    'encoded',
    ''
    );
	
//Register EditBankByid function 
$server->register('EditBankByid',
    array('id_banco' => 'xsd:int','nombre_banco' => 'xsd:string','id_usuario' => 'xsd:int'),	
	array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#EditBankByid',
    'rpc',
    'encoded',
    ''
    );	
//Register EditPositionByid function
$server->register('EditPositionByid',
    array('id_cargo' => 'xsd:int','nombre_cargo' => 'xsd:string','codigo_cargo' => 'xsd:string','id_usuario' => 'xsd:int'),	
	array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#EditPositionByid',
    'rpc',
    'encoded',
    ''
    );
//Register EditDepartmentByid function
$server->register('EditDepartmentByid',
    array('id_departamento' => 'xsd:int','nombre_departamento' => 'xsd:string','codigo_departamento' => 'xsd:string','id_usuario' => 'xsd:int'),	
    array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#EditDepartmentByid',
    'rpc',
    'encoded',
    ''
    );
//Register EditDiscountsIncomeByid function 
$server->register('EditDiscountsIncomeByid',
    array('id_descuento_ingreso' => 'xsd:int','cod_descuento_ingreso' => 'xsd:string','nombre_descuento_ingreso' => 'xsd:string','tipo' => 'xsd:string','numero_cuenta' => 'xsd:string','id_usuario' => 'xsd:int'),	
    array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#EditDiscountsIncomeByid',
    'rpc',
    'encoded',
    ''
    );
//Register EditDiscountsIncomeEmployeeByid function 
$server->register('EditDiscountsIncomeEmployeeByid',
    array('id_descuento_ingreso_empleado' =>'xsd:int','numero_cliente' =>'xsd:string','numero_cuenta' => 'xsd:string','id_descuento_ingreso' => 'xsd:int',
		  'monto_mes' => 'xsd:string','monto_periodo' => 'xsd:string',
		  'afecta_diciembre' => 'xsd:string','prioridad' => 'xsd:string','tipo'=> 'xsd:string',
		  'frecuencia' => 'xsd:string','monto_urgente' =>'xsd:string','monto_original' =>'xsd:string','monto_pendiente' =>'xsd:string','estado' =>'xsd:int',
		  'referencia' =>'xsd:string', 'id_periodo' => 'xsd:int',
		  'id_usuario' => 'xsd:int'),	
    array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#EditDiscountsIncomeEmployeeByid',
    'rpc',
    'encoded',
    ''
    );
//Register EditDayHolidayByid function 
$server->register('EditDayHolidayByid',
    array('id_dia_feriado' => 'xsd:int','fecha_dia_feriado' => 'xsd:string','celebracion' => 'xsd:string','id_usuario' => 'xsd:int'),	
	array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#EditDayHolidayByid',
    'rpc',
    'encoded',
    ''
    );	
//Register EditEmployeeByid function 
$server->register('EditEmployeeByid',
   array('id_empleado' => 'xsd:int','numero_empleado' =>'xsd:string','cedula' => 'xsd:string','seguro_social' => 'xsd:string',
		'apellido' => 'xsd:string','nombre' =>	'xsd:string','id_genero' => 'xsd:int','id_nacionalidad' => 'xsd:int',
		'id_estado_civil' => 'xsd:int','fecha_nacimiento' => 'xsd:string','tipo_de_sangre'=> 'xsd:string',
		'id_estado_empleado' => 'xsd:int','id_seccion' =>'xsd:int','id_cargo' =>'xsd:int', 
		'horas_x_periodo' => 'xsd:string','rata_x_hora' => 'xsd:string','salario' => 'xsd:string', 
		'fecha_vence_contrato' => 'xsd:string','fecha_venc_carnet' => 'xsd:string','pago_efectivo' => 'xsd:int', 
		'sindicato' => 'xsd:int','clave_renta' =>'xsd:string','forma_pago' => 'xsd:string',
		'frecuencia_pago' => 'xsd:string','fecha_ingreso' =>'xsd:string','fecha_prox_vacaciones' => 'xsd:string',
		'fecha_terminacion '=> 'xsd:string','isr_gasto' =>'xsd:int','id_empresa' => 'xsd:int'),	
    array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#EditEmployeeByid',
    'rpc',
    'encoded',
    ''
    );	
//Register EditCompanyByid function
$server->register('EditCompanyByid',
    array('id_empresa' => 'xsd:int','nombre_empresa' => 'xsd:string','representante_legal' => 'xsd:string','direccion' => 'xsd:string','apartado_postal' => 'xsd:string','comentario' => 'xsd:string','telefono_1' => 'xsd:string','codigo_actividad' => 'xsd:int'),	
    array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#EditCompanyByid',
    'rpc',
    'encoded',
    ''
    );
//Register EditStateCivilByid function
$server->register('EditStateCivilByid',
    array('id_estado_civil' => 'xsd:int','nombre_estado_civil' => 'xsd:string','id_usuario' => 'xsd:int'),	
	array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#EditStateCivilByid',
    'rpc',
    'encoded',
    ''
    );	
//Register EditStateEmployeeByid function 
$server->register('EditStateEmployeeByid',
    array('id_estado_empleado' => 'xsd:int','nombre_estado_empleado' => 'xsd:string','descripcion' => 'xsd:string','id_usuario' => 'xsd:int'),	
	array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#EditStateEmployeeByid',
    'rpc',
    'encoded',
    ''
    );	
//Register EditStateUserByid function 
$server->register('EditStateUserByid',
    array('id_estado_usuario' => 'xsd:int','nombre_estado_usuario' => 'xsd:string','descripcion' => 'xsd:string','id_usuario' => 'xsd:int'),	
	array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#EditStateUserByid',
    'rpc',
    'encoded',
    ''
    );	
//Register EditGenderByid function 
$server->register('EditGenderByid',
    array('id_genero' => 'xsd:int','nombre_genero' => 'xsd:string','id_usuario' => 'xsd:int'),	
	array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#EditGenderByid',
    'rpc',
    'encoded',
    ''
    );	
//Register EditLegalTaxByid function 
$server->register('EditLegalTaxByid',
    array('id_impuesto_legal' => 'xsd:int','segsoc' => 'xsd:string','segedu' => 'xsd:string','isr' => 'xsd:string','porcentaje_segsoc' => 'xsd:string','porcentaje_segedu' => 'xsd:string','porcentaje_isr' => 'xsd:string','estado' => 'xsd:int','id_usuario' => 'xsd:int'),	
	array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#EditLegalTaxByid',
    'rpc',
    'encoded',
    ''
    );	

//Register EditWorkingDayByid function
$server->register('EditWorkingDayByid', 
    array('id_jornada' => 'xsd:int','codigo_jornada' => 'xsd:string','id_turno' => 'xsd:int','turno' => 'xsd:string','descripcion' => 'xsd:string','hora_inicia' => 'xsd:string','hora_termina' => 'xsd:string','total_horas' => 'xsd:string','paga' => 'xsd:string','id_usuario' => 'xsd:int'),	
    array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#EditWorkingDayByid',
    'rpc',
    'encoded',
    ''
    );	
//Register EditWorkingDayEmployeeByid function
$server->register('EditWorkingDayEmployeeByid', 
    array('id_jornada_empleado' => 'xsd:int','laboro' => 'xsd:int','ausencia' => 'xsd:string','tipo' => 'xsd:string','codigo' => 'xsd:string','codigo_jornada' => 'xsd:string','com' => 'xsd:string','hora_entra' => 'xsd:string','hora_sale' => 'xsd:string','horas_regulares' => 'xsd:string','horas_extras' => 'xsd:string'),	
    array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#EditWorkingDayEmployeeByid',
    'rpc',
    'encoded',
    ''
    );	
//Register EditNationalityByid function  
$server->register('EditNationalityByid',
    array('id_nacionalidad' => 'xsd:int','nombre_pais' => 'xsd:string','nacionalidad' => 'xsd:string','id_usuario' => 'xsd:int'),	
	array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#EditNationalityByid',
    'rpc',
    'encoded',
    ''
    );		
//Register EditPeriodByid function 
$server->register('EditPeriodByid',
    array('id_periodo' => 'xsd:int','anno_fiscal' => 'xsd:string','frecuencia_pago' => 'xsd:string',
	'numero_periodo' => 'xsd:string','fecha_pago' => 'xsd:string',
	'fecha_desde' => 'xsd:string','fecha_hasta' => 'xsd:string',
	'secuencia_mensual' => 'xsd:string','estatus' => 'xsd:string','id_usuario' => 'xsd:int'),	
	array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#EditPeriodByid',
    'rpc',
    'encoded',
    ''
    );
//Register EditEmployeeRecordTransactionByid function
$server->register('EditEmployeeRecordTransactionByid',
    array('id_registro_transaccion_empleado' =>'xsd:int','id_empleado' =>'xsd:int', 'id_periodo' => 'xsd:int',
		 'horas_regular' =>'xsd:string', 'horas_domingo' => 'xsd:string', 
		  'horas_feriado' =>'xsd:string', 'horas_compensatorio' => 'xsd:string',
		  'horas_extra1' => 'xsd:string','horas_extra2' => 'xsd:string', 'horas_extra3' => 'xsd:string', 'horas_extra4' => 'xsd:string', 'horas_extra5' => 'xsd:string',
		  'horas_extra6' =>'xsd:string','horas_extra7' => 'xsd:string', 'horas_extra8' => 'xsd:string', 'horas_extra9' => 'xsd:string', 'horas_extra10' => 'xsd:string',
		  'factor_reg' => 'xsd:string','factor_dom' => 'xsd:string', 'factor_fer' =>'xsd:string', 'factor_com' => 'xsd:string', 
		  'factor1' => 'xsd:string', 'factor2' => 'xsd:string', 'factor3' => 'xsd:string', 'factor4' => 'xsd:string', 'factor5' => 'xsd:string',
		  'factor6' =>'xsd:string', 'factor7' => 'xsd:string', 'factor8' => 'xsd:string', 'factor9' => 'xsd:string', 'factor10' => 'xsd:string',
		   'horas_enferm' => 'xsd:string', 'horas_ajuste' =>'xsd:string', 'horas_ausen' => 'xsd:string', 'horas_certmedic' =>'xsd:string', 'adelanto_vacaciones' => 'xsd:string'),	
    array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#EditEmployeeRecordTransactionByid',
    'rpc',
    'encoded',
    ''
    );	
//Register EditRolByid function  
$server->register('EditRolByid',
    array('id_rol' => 'xsd:int','nombre_rol' => 'xsd:string','descripcion' => 'xsd:string','id_usuario' => 'xsd:int'),	
	array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#EditRolByid',
    'rpc',
    'encoded',
    ''
    );	
//Register EditSectionByid function  
$server->register('EditSectionByid',
    array('id_seccion' => 'xsd:int','id_departamento' => 'xsd:int','nombre_seccion' => 'xsd:string','codigo_seccion' => 'xsd:string','id_usuario' => 'xsd:int'),	
	array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#EditSectionByid',
    'rpc',
    'encoded',
    ''
    );	
//Register EditBloodTypeByid function 
$server->register('EditBloodTypeByid',
    array('id_tipo_sangre' => 'xsd:int','tipo_sangre' => 'xsd:string','id_usuario' => 'xsd:int'),	
	array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#EditBloodTypeByid',
    'rpc',
    'encoded',
    ''
    );	
//Register EditTurnByid function 
$server->register('EditTurnByid',
    array('id_turno' => 'xsd:int','turno' => 'xsd:string','id_usuario' => 'xsd:int'),	
	array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#EditTurnByid',
    'rpc',
    'encoded',
    ''
    );	 	
//Register EditUserByid function
$server->register('EditUserByid',
    array('id_usuario' => 'xsd:int','id_rol' => 'xsd:int','nombre_usuario' => 'xsd:string','pwd' => 'xsd:string','id_estado_usuario' => 'xsd:int'),	
    array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#EditUserByid',
    'rpc',
    'encoded',
    ''
    );
	
//Register EditBankAccountByidEmployee function
$server->register('EditBankAccountByidEmployee',
    array('id_empleado' => 'xsd:int','numero_cuenta' => 'xsd:string','id_tipo_cuenta' => 'xsd:int','nombre_tipo_cuenta' => 'xsd:string','id_banco' => 'xsd:int'),	
    array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#EditBankAccountByidEmployee',
    'rpc',
    'encoded',
    ''
    );
//Register EditPeriod function
$server->register('EditPeriod',
    array(),	
    array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#EditPeriod',
    'rpc',
    'encoded',
    ''
    );
//Register DeleteCompanyByid function 
$server->register('DeleteCompanyByid',
    array('id_empresa' => 'xsd:int'),	
	array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#DeleteCompanyByid',
    'rpc',
    'encoded',
    ''
    );	
//Register DeletePeriodByid function 
$server->register('DeletePeriodByid',
    array('id_periodo' => 'xsd:int','id_usuario' => 'xsd:int'),	
	array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#DeletePeriodByid',
    'rpc',
    'encoded',
    ''
    );	

//Register GetBankByid function
$server->register('GetBankByid',
    array('id_banco' => 'xsd:int'),	
    array('return' => 'tns:return_GetBanks'),
    $ns,
    $ns.'#GetBankByid',
    'rpc',
    'encoded',
    ''
    );		
//Register GetPositionByid function
$server->register('GetPositionByid',
    array('id_cargo' => 'xsd:int'),	
    array('return' => 'tns:return_GetPositions'),
    $ns,
    $ns.'#GetPositionByid',
    'rpc',
    'encoded',
    ''
    );	
//Register GetDepartmentByid function
$server->register('GetDepartmentByid',
    array('id_departamento' => 'xsd:int'),	
    array('return' => 'tns:return_GetDepartments'),
    $ns,
    $ns.'#GetDepartmentsByid',
    'rpc',
    'encoded',
    ''
    );	
//Register GetDiscountsIncomeByid function
$server->register('GetDiscountsIncomeByid',
    array('id_descuento_ingreso' => 'xsd:int'),	
    array('return' => 'tns:return_GetDiscountsIncome'),
    $ns,
    $ns.'#GetDiscountsIncomeByid',
    'rpc',
    'encoded',
    ''
    );
//Register GetDiscountsIncomeEmployeeByid function 
$server->register('GetDiscountsIncomeEmployeeByid',
    array('id_descuento_ingreso_empleado' => 'xsd:int'),	
    array('return' => 'tns:return_GetDiscountsIncomeEmployees'),
    $ns,
    $ns.'#GetDiscountsIncomeEmployeeByid',
    'rpc',
    'encoded',
    ''
    );
//Register GetDayHolidayByid function 
$server->register('GetDayHolidayByid',
    array('id_dia_feriado' => 'xsd:int'),	
    array('return' => 'tns:return_GetDayHolidays'),
    $ns,
    $ns.'#GetDayHolidayByid',
    'rpc',
    'encoded',
    ''
    );	
//Register GetEmployeeByid function
$server->register('GetEmployeeByid',
    array('id_empleado' => 'xsd:int'),	
    array('return' => 'tns:return_GetEmployees'),
    $ns,
    $ns.'#GetEmployeeByid',
    'rpc',
    'encoded',
    ''
    );
//Register GetCompanyByid function
$server->register('GetCompanyByid',
    array('id_empresa' => 'xsd:int'),	
    array('return' => 'tns:return_GetCompanies'),
    $ns,
    $ns.'#GetCompanyByid',
    'rpc',
    'encoded',
    ''
    );
//Register GetStateCivilByid function
$server->register('GetStateCivilByid',
    array('id_estado_civil' => 'xsd:int'),	
    array('return' => 'tns:return_GetStatesCivil'),
    $ns,
    $ns.'#GetStateCivilByid',
    'rpc',
    'encoded',
    ''
    );	
//Register GetStateEmployeeByid function
$server->register('GetStateEmployeeByid',
    array('id_estado_empleado' => 'xsd:int'),	
    array('return' => 'tns:return_GetStatesEmployees'),
    $ns,
    $ns.'#GetStateEmployeeByid',
    'rpc',
    'encoded',
    ''
    );	
//Register GetStateUserByid function
$server->register('GetStateUserByid',
    array('id_estado_usuario' => 'xsd:int'),	
    array('return' => 'tns:return_GetStatesUsers'),
    $ns,
    $ns.'#GetStateUserByid',
    'rpc',
    'encoded',
    ''
    );
//Register GetGenderByid function
$server->register('GetGenderByid',
    array('id_genero' => 'xsd:int'),	
    array('return' => 'tns:return_GetGenders'),
    $ns,
    $ns.'#GetGenderByid',
    'rpc',
    'encoded',
    ''
    );	
	
//Register GetLegalTaxByid function
$server->register('GetLegalTaxByid',
    array('id_impuesto_legal' => 'xsd:int'),	
    array('return' => 'tns:return_GetLegalTaxes'),
    $ns,
    $ns.'#GetLegalTaxByid',
    'rpc',
    'encoded',
    ''
    );		
//Register GetWorkingDayByid function
$server->register('GetWorkingDayByid',
    array('id_jornada' => 'xsd:int'),	
    array('return' => 'tns:return_GetWorkingDays'),
    $ns,
    $ns.'#GetWorkingDayByid',
    'rpc',
    'encoded',
    ''
    );
//Register GetWorkingDayEmployeeByid function
$server->register('GetWorkingDayEmployeeByid',
    array('id_jornada_empleado' => 'xsd:int'),	
    array('return' => 'tns:return_GetWorkingDaysEmployees'),
    $ns,
    $ns.'#GetWorkingDayEmployeeByid',
    'rpc',
    'encoded',
    ''
    );
//Register GetNationalityByid function
$server->register('GetNationalityByid',
    array('id_nacionalidad' => 'xsd:int'),	
    array('return' => 'tns:return_GetNationalities'),
    $ns,
    $ns.'#GetNationalityByid',
    'rpc',
    'encoded',
    ''
    );
//Register GetPeriodByid function
$server->register('GetPeriodByid',
    array('id_periodo' => 'xsd:int'),	
    array('return' => 'tns:return_GetPeriods'),
    $ns,
    $ns.'#GetPeriodByid',
    'rpc',
    'encoded',
    ''
    );
	
//Register GetRolByid function
$server->register('GetRolByid',
    array('id_rol' => 'xsd:int'),	
    array('return' => 'tns:return_GetRoles'),
    $ns,
    $ns.'#GetRolByid',
    'rpc',
    'encoded',
    ''
    );
//Register GetSectionByid function
$server->register('GetSectionByid',
    array('id_seccion' => 'xsd:int'),	
    array('return' => 'tns:return_GetSections'),
    $ns,
    $ns.'#GetSectionByid',
    'rpc',
    'encoded',
    ''
    );
//Register GetBloodTypeByid function
$server->register('GetBloodTypeByid',
    array('id_tipo_sangre' => 'xsd:int'),	
    array('return' => 'tns:return_GetBloodType'),
    $ns,
    $ns.'#GetBloodTypeByid',
    'rpc',
    'encoded',
    ''
    );
//Register GetTurnByid function
$server->register('GetTurnByid',
    array('id_turno' => 'xsd:int'),	
    array('return' => 'tns:return_GetTurn'),
    $ns,
    $ns.'#GetTurnByid',
    'rpc',
    'encoded',
    ''
    );
//Register GetUserByid function
$server->register('GetUserByid',
    array('id_usuario' => 'xsd:int'),	
    array('return' => 'tns:return_GetUsers'),
    $ns,
    $ns.'#GetUserByid',
    'rpc',
    'encoded',
    ''
    );	

//Register GetUserByName function
$server->register('GetUserByName',
    array('nombre_usuario' => 'xsd:string','pwd' => 'xsd:string'),	
    array('return' => 'tns:return_GetUser'),
    $ns,
    $ns.'#GetUserByName',
    'rpc',
    'encoded',
    ''
    );
//Register GetEmployeeByidCompany function
$server->register('GetEmployeeByidCompany',
    array('id_empresa' => 'xsd:int'),	
    array('return' => 'tns:return_GetEmployees'),
    $ns,
    $ns.'#GetAllEmployeeByidCompany',
    'rpc',
    'encoded',
    ''
    );
//Register GetBankAccountByidEmployee function
$server->register('GetBankAccountByidEmployee',
    array('id_empleado' => 'xsd:int'),	
    array('return' => 'tns:return_GetBankAccount'),
    $ns,
    $ns.'#GetBankAccountByidEmployee',
    'rpc',
    'encoded',
    ''
    );
//Register GetAllDiscountsIncomeEmployeeByidEmployee function 
$server->register('GetAllDiscountsIncomeEmployeeByidEmployee',
    array('id_empleado' => 'xsd:int'),	
    array('return' => 'tns:return_GetDiscountsIncomeEmployees'),
    $ns,
    $ns.'#GetAllDiscountsIncomeEmployeeByidEmployee',
    'rpc',
    'encoded',
    ''
    );
//Register GetPeriodByStatus function 
$server->register('GetPeriodByStatus',
    array(),	
    array('return' => 'tns:return_GetPeriods'),
    $ns,
    $ns.'#GetPeriodByStatus',
    'rpc',
    'encoded',
    ''
    );
//Register GetPeriodByid function 
$server->register('GetPeriodByid',
    array('id_periodo' => 'xsd:int'),	
    array('return' => 'tns:return_GetPeriods'),
    $ns,
    $ns.'#GetPeriodByid',
    'rpc',
    'encoded',
    ''
    );		
//Register GetWorkingDayEmployeeByPeriod function 
$server->register('GetWorkingDayEmployeeByPeriod',
    array('id_empleado' => 'xsd:int','id_periodo' => 'xsd:int','anno_fiscal' => 'xsd:string'),	
    array('return' => 'tns:return_GetWorkingDaysEmployees'),
    $ns,
    $ns.'#GetWorkingDayEmployeeByPeriod',
    'rpc',
    'encoded',
    ''
    );	
//Register GetLegalTaxesByStatus function
$server->register('GetLegalTaxesByStatus',
    array(),	
    array('return' => 'tns:return_GetLegalTaxes'),
    $ns,
    $ns.'#GetLegalTaxesByStatus',
    'rpc',
    'encoded',
    ''
    );
//Register GetReceiptEmployeeByCompany function
$server->register('GetReceiptEmployeeByCompany',
    array('id_empresa' => 'xsd:int','id_periodo' => 'xsd:int'),	
    array('return' => 'tns:return_GetMsg'),
    $ns,
    $ns.'#GetReceiptEmployeeByCompany',
    'rpc',
    'encoded',
    ''
    );
//Register GetEmployeesRecordsTransactionsByid function
$server->register('GetEmployeesRecordsTransactionsByid',
    array('id_empleado' => 'xsd:int'),	
    array('return' => 'tns:return_GetRecordsEmployees'),
    $ns,
    $ns.'#GetEmployeesRecordsTransactionsByid',
    'rpc',
    'encoded',
    ''
    );
//Register GetInformeBankEmployeesByid function 
$server->register('GetInformeBankEmployeesByid',
     array('id_empresa' => 'xsd:int','id_periodo' => 'xsd:int'),		
    array('return' => 'tns:return_ViewInformeBankEmployees'),
    $ns,
    $ns.'#GetInformeBankEmployeesByid',
    'rpc',
    'encoded',
    ''
    );
//Register GetDayHolidayByfecha function 
$server->register('GetDayHolidayByfecha',
    array('fecha_dia_feriado' => 'xsd:string'),	
    array('return' => 'tns:return_GetDayHolidays'),
    $ns,
    $ns.'#GetDayHolidayByid',
    'rpc',
    'encoded',
    ''
    );		
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : "";
$server->service($HTTP_RAW_POST_DATA);
//-------------------------------------------------
//Body GetAllBanks function
function GetAllBanks() {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		 $sql="SELECT id_banco, nombre_banco, fecha_creacion  FROM bancos";
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {				 
				while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					  $result[] = array('id_banco' => $id_banco, 'nombre_banco' => $nombre_banco, 'fecha_creacion' => $fecha_creacion); 
				}
			}  
		  

    }
    mysqli_close($connect);
    return $result;
}
//Body GetAllPositions function
function GetAllPositions() {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		 $sql="SELECT id_cargo, nombre_cargo, codigo_cargo, fecha_creacion FROM cargos";
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {				 
				while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					  $result[] = array('id_cargo' => $id_cargo, 'nombre_cargo' => $nombre_cargo, 'codigo_cargo' => $codigo_cargo, 'fecha_creacion' => $fecha_creacion); 
				}
			}  
		  

    }
    mysqli_close($connect);
    return $result;
}
//Body GetAllDepartments function 
function GetAllDepartments() {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		 $sql="SELECT id_departamento, nombre_departamento, codigo_departamento, fecha_creacion 
		 FROM departamentos";
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {
                while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					  $result[] = array('id_departamento' => $id_departamento, 'nombre_departamento' => $nombre_departamento, 'codigo_departamento' => $codigo_departamento, 'fecha_creacion' => $fecha_creacion); 
				}
			}

    }
    mysqli_close($connect);
    return $result;
}
//Body GetAllDiscountsIncome function 
function GetAllDiscountsIncome() {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		 $sql="SELECT id_descuento_ingreso, cod_descuento_ingreso, nombre_descuento_ingreso, tipo, numero_cuenta
			   FROM descuentos_ingresos";
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					  $result[] = array('id_descuento_ingreso' => $id_descuento_ingreso, 'cod_descuento_ingreso' => $cod_descuento_ingreso, 'nombre_descuento_ingreso' => $nombre_descuento_ingreso, 'tipo' => $tipo,'numero_cuenta' => $numero_cuenta); 
				}
			}

    }
    mysqli_close($connect);
    return $result;
}
//Body GetAllDayHolidays function 
function GetAllDayHolidays() {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		 $sql="SELECT id_dia_feriado, fecha_dia_feriado, celebracion, fecha_creacion, id_usuario 
		 FROM dias_feriados";
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					  $result[] = array('id_dia_feriado' => $id_dia_feriado, 'fecha_dia_feriado' => $fecha_dia_feriado, 'celebracion' => $celebracion, 'fecha_creacion' => $fecha_creacion, 'id_usuario' => $id_usuario); 
				}
			}

    }
    mysqli_close($connect);
    return $result;
}
//Body GetAllEmployees function
function GetAllEmployees() {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		 $sql="SELECT id_empleado, numero_empleado, nombre, apellido, cedula, fecha_nacimiento, 
		 seguro_social, tipo_sangre, id_estado_empleado, id_genero, id_estado_civil, 
		 id_nacionalidad, sindicato, fecha_venc_carnet, clave_renta, forma_pago, 
		 salario, rata_x_hora, horas_x_periodo, fecha_ingreso, fecha_prox_vacaciones, 
		 fecha_venc_contrato, pago_efectivo, frecuencia_pago, isr_gasto, fecha_terminacion, 
		 id_cargo, id_seccion, id_empresa FROM empleados";
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					  $result[] = array('id_empleado' =>$id_empleado,'numero_empleado'=>$numero_empleado,'cedula'=>$cedula,'seguro_social'=>$seguro_social,'apellido'=>$apellido,
										'nombre'=>$nombre,'id_genero'=>$id_genero,'id_nacionalidad'=>$id_nacionalidad,'id_estado_civil'=>$id_estado_civil,
										'fecha_nacimiento'=>$fecha_nacimiento,'tipo_sangre'=>$tipo_sangre,'id_estado_empleado'=>$id_estado_empleado,
										'id_seccion'=>$id_seccion,'id_cargo'=>$id_cargo,'horas_x_periodo'=>$horas_x_periodo,'rata_x_hora'=>$rata_x_hora,
										'salario'=>$salario,'fecha_venc_contrato'=>$fecha_venc_contrato,'fecha_venc_carnet'=>$fecha_venc_carnet,
										'pago_efectivo'=>$pago_efectivo,'sindicato'=>$sindicato,'clave_renta'=>$clave_renta,'forma_pago'=>$forma_pago,
										'frecuencia_pago'=>$frecuencia_pago,'fecha_ingreso'=>$fecha_ingreso,'fecha_prox_vacaciones'=>$fecha_prox_vacaciones,
										'fecha_terminacion'=>$fecha_terminacion,'isr_gasto'=>$isr_gasto,'id_empresa'=>$id_empresa); 
				}
			}
			else
			{
					 $result[] = array('id_empleado' =>null,'numero_empleado'=>null,'cedula'=>null,'seguro_social'=>null,'apellido'=>null,
										'nombre'=>null,'id_genero'=>null,'id_nacionalidad'=>null,'id_estado_civil'=>null,
										'fecha_nacimiento'=>null,'tipo_sangre'=>null,'id_estado_empleado'=>null,
										'id_seccion'=>null,'id_cargo'=>null,'horas_x_periodo'=>null,'rata_x_hora'=>null,
										'salario'=>null,'fecha_venc_contrato'=>null,'fecha_venc_carnet'=>null,
										'pago_efectivo'=>null,'sindicato'=>null,'clave_renta'=>null,'forma_pago'=>null,
										'frecuencia_pago'=>null,'fecha_ingreso'=>null,'fecha_prox_vacaciones'=>null,
										'fecha_terminacion'=>null,'isr_gasto'=>null,'id_empresa'=>null);
			}

    }
    mysqli_close($connect);
    return $result;
}
//Body GetAllCompanies function
function GetAllCompanies() {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		 $sql="SELECT id_empresa, nombre_empresa, representante_legal, direccion, apartado_postal, comentario, telefono_1, telefono_2, codigo_actividad, anno_proceso, mes_proceso, clave_acceso 
		 FROM empresas WHERE mostrar=1";
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					  $result[] = array('id_empresa' => $id_empresa,'nombre_empresa' => $nombre_empresa,'representante_legal' => $representante_legal, 
					  'direccion' => $direccion,'apartado_postal' => $apartado_postal,'comentario' => $comentario, 
					  'telefono_1' => $telefono_1,'telefono_2' => $telefono_2,'codigo_actividad' => $codigo_actividad, 
					  'anno_proceso' => $anno_proceso,'mes_proceso' => $mes_proceso,'clave_acceso' => $clave_acceso); 
				}
			}  
		  

	}

    mysqli_close($connect);
    return $result;
}
//Body GetAllStatesCivil function
function GetAllStatesCivil() {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		 $sql="SELECT id_estado_civil, nombre_estado_civil,fecha_creacion, id_usuario  FROM estados_civiles";
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					  $result[] = array('id_estado_civil' => $id_estado_civil, 'nombre_estado_civil' => $nombre_estado_civil, 'fecha_creacion' => $fecha_creacion, 'id_usuario' => $id_usuario); 
				}
			}  
		  

    }
    mysqli_close($connect);
    return $result;
}
//Body GetAllStatesEmployees function
function GetAllStatesEmployees() {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		 $sql="SELECT id_estado_empleado, nombre_estado_empleado, descripcion, fecha_creacion, id_usuario FROM estados_empleados";
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					  $result[] = array('id_estado_empleado' => $id_estado_empleado, 'nombre_estado_empleado' => $nombre_estado_empleado, 'descripcion' => $descripcion, 'fecha_creacion' => $fecha_creacion, 'id_usuario' => $id_usuario); 
				}
			}  
		  

    }
    mysqli_close($connect);
    return $result;
}
//Body GetAllStatesUsers function
function GetAllStatesUsers() {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		  $sql="SELECT id_estado_usuario, nombre_estado_usuario, descripcion, fecha_creacion, id_usuario FROM estados_usuarios";
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					   $result[] = array('id_estado_usuario' => $id_estado_usuario, 'nombre_estado_usuario' => $nombre_estado_usuario, 'descripcion' => $descripcion, 'fecha_creacion' => $fecha_creacion, 'id_usuario' => $id_usuario); 
				}
			}  
		  

    }
    mysqli_close($connect);
    return $result;
}
//Body GetAllGenders function
function GetAllGenders() {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		 $sql="SELECT id_genero, nombre_genero FROM generos";
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					  $result[] = array('id_genero' => $id_genero, 'nombre_genero' => $nombre_genero); 
				}
			}  
		  

    }
    mysqli_close($connect);
    return $result;
}
//Body GetAllWorkingDays function
function GetAllWorkingDays() {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		 $sql="SELECT id_jornada, codigo_jornada, id_turno, turno, descripcion, hora_inicia, hora_termina, total_horas, paga FROM jornadas";
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					  $result[] = array('id_jornada' => $id_jornada,'codigo_jornada' => $codigo_jornada,'id_turno' => $id_turno,'turno' => $turno, 
					  'descripcion' => $descripcion,'hora_inicia' => $hora_inicia, 'hora_termina' => $hora_termina,
					  'total_horas' => $total_horas, 'paga' => $paga); 
				}
			}  
		  

    }
    mysqli_close($connect);
    return $result;
}
//Body GetAllNationalities function
function GetAllNationalities() {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		 $sql="SELECT id_nacionalidad, nombre_pais, nacionalidad FROM nacionalidades";
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					  $result[] = array('id_nacionalidad' => $id_nacionalidad, 'nombre_pais' => $nombre_pais, 'nacionalidad' => $nacionalidad); 
				}
			}  
		  

    }
    mysqli_close($connect);
    return $result;
}
//Body GetAllPeriods function
function GetAllPeriods() {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		 $sql="SELECT id_periodo, anno_fiscal, frecuencia_pago, numero_control,numero_periodo, fecha_pago, fecha_inicio, fecha_final, secuencia_mensual, estatus, fecha_creacion, id_usuario 
		 FROM periodos WHERE mostrar=1 order by id_periodo asc";
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					   $result[] = array('id_periodo' => $id_periodo,'anno_fiscal' => $anno_fiscal,'frecuencia_pago' => $frecuencia_pago,'numero_control' => $numero_control,
					  'numero_periodo' => $numero_periodo, 'fecha_pago' => $fecha_pago, 'fecha_inicio' => $fecha_inicio, 
					  'fecha_final' => $fecha_final, 'secuencia_mensual' => $secuencia_mensual, 'estatus' => $estatus, 'fecha_creacion' => $fecha_creacion, 'id_usuario' => $id_usuario); 
						
				}
			}  
		  

    }
    mysqli_close($connect);
    return $result;
}
//Body GetAllRoles function
function GetAllRoles() {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		 $sql="SELECT id_rol, nombre_rol, descripcion, fecha_creacion, id_usuario FROM roles";
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					  $result[] = array('id_rol' => $id_rol, 'nombre_rol' => $nombre_rol, 'descripcion' => $descripcion, 'fecha_creacion' => $fecha_creacion, 'id_usuario' => $id_usuario); 
				}
			}  
		  

    }
    mysqli_close($connect);
    return $result;
}
//Body GetAllUsers function
function GetAllUsers() {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		 $sql="SELECT nombre_usuario, nombre_rol, pwd, nombre_estado_usuario,usuarios.id_usuario,usuarios.id_rol,usuarios.id_estado_usuario 
		 FROM usuarios,roles,estados_usuarios 
		 WHERE usuarios.id_rol=roles.id_rol 
		 AND usuarios.id_estado_usuario=estados_usuarios.id_estado_usuario";
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					  $result[] = array('nombre_usuario' => $nombre_usuario, 'nombre_rol' => $nombre_rol, 'pwd' => $pwd, 'nombre_estado_usuario' => $nombre_estado_usuario,'id_usuario' => $id_usuario, 'id_rol' => $id_rol,'id_estado_usuario' => $id_estado_usuario); 
				}
			}
			else
			{
					  $result[] = array('nombre_usuario' => null, 'nombre_rol' => null, 'pwd' => null, 'nombre_estado_usuario' => null,'id_usuario' => null, 'id_rol' => null,'id_estado_usuario' => null);  
			}
	
		  

    }
    mysqli_close($connect);
    return $result;
}
//Body GetAllSectionsDepartments function 
function GetAllSectionsDepartments() {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		 $sql="SELECT id_seccion, secciones.id_departamento, nombre_seccion, nombre_departamento, secciones.codigo_seccion 
		 FROM secciones,departamentos 
		 WHERE departamentos.id_departamento=secciones.id_departamento";
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					  $result[] = array('id_seccion' => $id_seccion, 'id_departamento' => $id_departamento, 'nombre_seccion' => $nombre_seccion, 'nombre_departamento' => $nombre_departamento,'codigo_seccion' => $codigo_seccion); 
				}
			}

    }
    mysqli_close($connect);
    return $result;
}
//Body GetAllSections function 
function GetAllSections() {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		 $sql="SELECT id_seccion, secciones.id_departamento, nombre_seccion, nombre_departamento, secciones.codigo_seccion 
		 FROM secciones,departamentos 
		 WHERE departamentos.id_departamento=secciones.id_departamento";
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					  $result[] = array('id_seccion' => $id_seccion, 'id_departamento' => $id_departamento, 'nombre_seccion' => $nombre_seccion, 'nombre_departamento' => $nombre_departamento,'codigo_seccion' => $codigo_seccion); 
				}
			}

    }
    mysqli_close($connect);
    return $result;
}
//Body GetAllLegalTaxes function 
function GetAllLegalTaxes() {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
				 $sql="SELECT id_impuesto_legal, segsoc, segedu, isr, porcentaje_segsoc, porcentaje_segedu, 
				 porcentaje_isr, estado, fecha_creacion, id_usuario 
				 FROM impuestos_legales";
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					  $result[] = array('id_impuesto_legal' => $id_impuesto_legal, 'segsoc' => $segsoc, 
					  'segedu' => $segedu, 'isr' => $isr,'porcentaje_segsoc' => $porcentaje_segsoc,'porcentaje_segedu' => $porcentaje_segedu, 'porcentaje_isr' => $porcentaje_isr, 
					  'estado' => $estado, 'fecha_creacion' => $fecha_creacion,'id_usuario' => $id_usuario); 
				}
			}

    }
    mysqli_close($connect);
    return $result;
}
//Body AddBank function
function AddBank($nombre_banco) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"INSERT INTO bancos SET nombre_banco='$nombre_banco'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}
//Body AddPosition function
function AddPosition($nombre_cargo,$codigo_cargo,$id_usuario) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"INSERT INTO cargos SET nombre_cargo='$nombre_cargo', codigo_cargo='$codigo_cargo', id_usuario='$id_usuario'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}
//Body AddBankAccount function
function AddBankAccount($id_empleado,$numero_empleado,$numero_cuenta,$id_tipo_cuenta,$nombre_tipo_cuenta,$tipo_tranferencia,$id_banco) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"INSERT INTO cuentas_banco_empleados SET id_empleado='$id_empleado', numero_empleado='$numero_empleado', 
		   numero_cuenta='$numero_cuenta',id_tipo_cuenta='$id_tipo_cuenta', nombre_tipo_cuenta='$nombre_tipo_cuenta', 
		   tipo_tranferencia='$tipo_tranferencia',id_banco='$id_banco'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}
//Body AddDepartment function
function AddDepartment($nombre_departamento,$codigo_departamento,$id_usuario) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"INSERT INTO departamentos SET nombre_departamento='$nombre_departamento', codigo_departamento='$codigo_departamento', id_usuario='$id_usuario'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}
//Body AddDiscountsIncome function
function AddDiscountsIncome($cod_descuento_ingreso,$nombre_descuento_ingreso,$tipo,$numero_cuenta,$id_usuario) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"INSERT INTO descuentos_ingresos SET cod_descuento_ingreso='$cod_descuento_ingreso', nombre_descuento_ingreso='$nombre_descuento_ingreso', tipo='$tipo', numero_cuenta='$numero_cuenta',id_usuario='$id_usuario'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}
//Body AddDiscountsIncomeEmployee function
function AddDiscountsIncomeEmployee($numero_cliente, $numero_cuenta, $numero_empleado,$id_empleado, 
									$id_descuento_ingreso, $monto_mes, $monto_periodo, $afecta_diciembre,
									$prioridad,$tipo,$frecuencia,$monto_urgente, $monto_original,$monto_pendiente,$estado,$referencia,$id_periodo,$id_usuario) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"INSERT INTO descuentos_ingresos_empleados SET numero_cliente='$numero_cliente',numero_cuenta='$numero_cuenta', 
		   numero_empleado='$numero_empleado',id_empleado='$id_empleado',id_descuento_ingreso='$id_descuento_ingreso', monto_mes='$monto_mes', 
		   monto_periodo='$monto_periodo',afecta_diciembre='$afecta_diciembre',prioridad='$prioridad',
		   tipo='$tipo',frecuencia='$frecuencia',monto_urgente='$monto_urgente',monto_original='$monto_original',monto_pendiente='$monto_pendiente',estado='$estado',
		   referencia='$referencia',id_periodo='$id_periodo',id_usuario='$id_usuario'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}
//Body AddDiscountsIncomeEmployeeDetail function
function AddDiscountsIncomeEmployeeDetail($id_descuento_ingreso_empleado,$monto_mes, $monto_periodo,$monto_original,$monto_pendiente,$estado,$id_periodo,$id_usuario) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"INSERT INTO descuentos_ingresos_empleados_detalles SET id_descuento_ingreso_empleado='$id_descuento_ingreso_empleado',monto_mes='$monto_mes', 
		   monto_periodo='$monto_periodo',monto_original='$monto_original',monto_pendiente='$monto_pendiente',estado='$estado',id_periodo='$id_periodo',id_usuario='$id_usuario'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}
//Body AddDayHoliday function
function AddDayHoliday($fecha_dia_feriado,$celebracion,$id_usuario) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"INSERT INTO dias_feriados SET fecha_dia_feriado='$fecha_dia_feriado', celebracion='$celebracion', id_usuario='$id_usuario'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}

//Body AddEmployee function
function AddEmployee($numero_empleado,$cedula,$seguro_social,$apellido,$nombre,$id_genero,$id_nacionalidad,
						$id_estado_civil,$fecha_nacimiento,$tipo_sangre,$id_estado_empleado, $id_seccion,
						$id_cargo,$horas_x_periodo, $rata_x_hora, $salario, $fecha_venc_contrato,$fecha_venc_carnet,
						$pago_efectivo,$sindicato,$clave_renta,$forma_pago,$frecuencia_pago,$fecha_ingreso, 
						$fecha_prox_vacaciones,$fecha_terminacion,$isr_gasto,$id_empresa) {
    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"INSERT INTO empleados SET numero_empleado='$numero_empleado',cedula='$cedula',seguro_social='$seguro_social',
						apellido='$apellido',nombre='$nombre',id_genero='$id_genero',id_nacionalidad='$id_nacionalidad',
						id_estado_civil='$id_estado_civil',fecha_nacimiento='$fecha_nacimiento',tipo_sangre='$tipo_sangre',
						id_estado_empleado='$id_estado_empleado',id_seccion='$id_seccion',id_cargo='$id_cargo',
						horas_x_periodo='$horas_x_periodo',rata_x_hora='$rata_x_hora',salario='$salario',
						fecha_venc_contrato='$fecha_venc_contrato',fecha_venc_carnet='$fecha_venc_carnet',pago_efectivo='$pago_efectivo',
						sindicato='$sindicato',clave_renta='$clave_renta',forma_pago='$forma_pago',
						frecuencia_pago='$frecuencia_pago',fecha_ingreso='$fecha_ingreso',fecha_prox_vacaciones='$fecha_prox_vacaciones',
						fecha_terminacion='$fecha_terminacion',isr_gasto='$isr_gasto',id_empresa='$id_empresa'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}
//Body AddCompany function
function AddCompany($nombre_empresa,$representante_legal,$direccion,$apartado_postal,$comentario,$telefono_1,$codigo_actividad) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"INSERT INTO empresas SET nombre_empresa='$nombre_empresa', representante_legal='$representante_legal', 
		   direccion='$direccion', apartado_postal='$apartado_postal', comentario='$comentario', 
		   telefono_1='$telefono_1', codigo_actividad='$codigo_actividad'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}
//Body AddLegalTax function
function AddLegalTax($segsoc, $segedu, $isr, $porcentaje_segsoc, $porcentaje_segedu, $porcentaje_isr, $estado, $id_usuario) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"INSERT INTO impuestos_legales SET segedu='$segedu', segedu='$segedu', isr='$isr', 
		   porcentaje_segsoc='$porcentaje_segsoc', porcentaje_segedu='$porcentaje_segedu', porcentaje_isr='$porcentaje_isr', 
		   estado='$estado',id_usuario='$id_usuario'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}
//Body AddLegalTaxEmployee function
function AddLegalTaxEmployee($id_empleado, $numero_empleado, $monto_ss, $monto_se, $monto_isr, $id_periodo, $id_impuesto_legal) {
$connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"INSERT INTO impuestos_legales_empleados SET id_empleado='$id_empleado', numero_empleado='$numero_empleado', 
		   monto_ss='$monto_ss', monto_se='$monto_se', monto_isr='$monto_isr', 
		   id_periodo='$id_periodo', id_impuesto_legal='$id_impuesto_legal'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
	mysqli_close($connect);
    return $result;
}
//Body AddAllLegalTaxEmployee function
/*function AddAllLegalTaxEmployee($insData) {

    
	
	//function insertArr($tableName, $insData){
    //$db = new database();
	$connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
			$columns = implode(", ",array_keys($insData));
		    $escaped_values = array_map('mysql_real_escape_string', array_values($insData));
			foreach ($escaped_values as $idx=>$data) $escaped_values[$idx] = "'".$data."'";
				$values  = implode(", ", $escaped_values);
				$query = "INSERT INTO impuestos_legales_empleados ($columns) VALUES ($values)";
				mysql_query($query); 
				 //or die(mysql_error());
				//mysql_close($db->get_link());
				 $result[] = array("msg" => "OK","id" => mysql_insert_id());
		}
	}
	
   
   
    
    
//}
	
	
	
	
return $result;
}*/
//Body AddWorkingDay function
function AddWorkingDay($codigo_jornada,$id_turno,$turno,$descripcion,$hora_inicia,$hora_termina,$total_horas,$paga) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"INSERT INTO jornadas SET codigo_jornada='$codigo_jornada', id_turno='$id_turno', turno='$turno', 
		   descripcion='$descripcion', hora_inicia='$hora_inicia', hora_termina='$hora_termina', 
		   total_horas='$total_horas', paga='$paga'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}
//Body AddWorkingDayEmployee function
function AddWorkingDayEmployee($id_empleado,$numero_empleado,$fecha,$dia,$laboro,$ausencia,$tipo,$codigo,$codigo_jornada,$com,$hora_entra,$hora_sale,$horas_regulares,$horas_extras,$id_periodo,$anno_fiscal) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"INSERT INTO jornadas_empleados SET id_empleado='$id_empleado', numero_empleado='$numero_empleado', 
		   fecha='$fecha', dia='$dia', laboro='$laboro',ausencia='$ausencia', tipo='$tipo', 
		   codigo='$codigo',codigo_jornada='$codigo_jornada', com='$com', hora_entra='$hora_entra',
		   hora_sale='$hora_sale', horas_regulares='$horas_regulares', horas_extras='$horas_extras', id_periodo='$id_periodo', anno_fiscal='$anno_fiscal'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}
//Body AddPeriod function
function AddPeriod($anno_fiscal, $frecuencia_pago, $numero_control,$numero_periodo, $fecha_pago, $fecha_inicio, $fecha_final, $secuencia_mensual, $estatus, $id_usuario) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"INSERT INTO periodos SET anno_fiscal='$anno_fiscal', frecuencia_pago='$frecuencia_pago', numero_control='$numero_control',
		   numero_periodo='$numero_periodo', fecha_pago='$fecha_pago',fecha_inicio='$fecha_inicio', fecha_final='$fecha_final', 
		   secuencia_mensual='$secuencia_mensual', estatus='$estatus', id_usuario='$id_usuario'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}
//Body AddEmployeeRecordTransaction function
function AddEmployeeRecordTransaction($id_empleado, $id_periodo,$horas_regular, $horas_domingo,$horas_feriado, $horas_compensatorio,
									  $horas_extra1,$horas_extra2, $horas_extra3, $horas_extra4, $horas_extra5,$horas_extra6,$horas_extra7, 
									  $horas_extra8, $horas_extra9, $horas_extra10,$factor_reg,$factor_dom, $factor_fer, $factor_com, 
									  $factor1, $factor2, $factor3, $factor4, $factor5,$factor6, $factor7, $factor8, $factor9, $factor10,
									  $horas_enferm, $horas_ajuste, $horas_ausen, $horas_certmedic, $adelanto_vacaciones) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"INSERT INTO registros_transacciones_empleados SET id_empleado='$id_empleado', id_periodo='$id_periodo',
					horas_regular='$horas_regular', horas_domingo='$horas_domingo', 
					horas_feriado='$horas_feriado', horas_compensatorio='$horas_compensatorio',
					horas_extra1='$horas_extra1', horas_extra2='$horas_extra2', horas_extra3='$horas_extra3', horas_extra4='$horas_extra4', horas_extra5='$horas_extra5',
					horas_extra6='$horas_extra6', horas_extra7='$horas_extra7', horas_extra8='$horas_extra8', horas_extra9='$horas_extra9', horas_extra10='$horas_extra10',
					factor_reg='$factor_reg', factor_dom='$factor_dom', factor_fer='$factor_fer', factor_com='$factor_com', 
					factor1='$factor1', factor2='$factor2', factor3='$factor3', factor4='$factor4', factor5='$factor5',
					factor6='$factor6', factor7='$factor7', factor8='$factor8', factor9='$factor9', factor10='$factor10',
					horas_enferm='$horas_enferm', horas_ajuste='$horas_ajuste', horas_ausen='$horas_ausen', horas_certmedic='$horas_certmedic', adelanto_vacaciones='$adelanto_vacaciones'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}
 

//Body AddSection function
function AddSection($id_departamento, $nombre_seccion, $codigo_seccion, $id_usuario) {
    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"INSERT INTO secciones SET id_departamento='$id_departamento', nombre_seccion='$nombre_seccion', 
		   codigo_seccion='$codigo_seccion', id_usuario='$id_usuario'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}
//Body AddUsers function
function AddUser($id_rol,$nombre_usuario,$pwd,$id_estado_usuario) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"INSERT INTO usuarios SET id_rol='$id_rol', nombre_usuario='$nombre_usuario', pwd='$pwd', id_estado_usuario='$id_estado_usuario'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}
//Body AddReceiptsEmployees function
function AddReceiptsEmployees($id_empresa,$id_periodo) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"Call proc_talonarios_empleados($id_empresa,$id_periodo);");
		   $result[] = array("msg" => "OK","id" => 0);

	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}
//Body EditBankByid function
function EditBankByid($id_banco,$nombre_banco,$id_usuario) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"UPDATE cargos SET nombre_banco='$nombre_banco', id_usuario='$id_usuario' 
		   WHERE id_banco='$id_banco'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}
//Body EditPositionByid function
function EditPositionByid($id_cargo,$nombre_cargo,$codigo_cargo,$id_usuario) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"UPDATE cargos SET nombre_cargo='$nombre_cargo', codigo_cargo='$codigo_cargo', id_usuario='$id_usuario' 
		   WHERE id_cargo='$id_cargo'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}
//Body EditDepartmentByid function
function EditDepartmentByid($id_departamento,$nombre_departamento,$codigo_departamento,$id_usuario) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"UPDATE departamentos SET nombre_departamento='$nombre_departamento', codigo_departamento='$codigo_departamento', id_usuario='$id_usuario' 
		   WHERE id_departamento='$id_departamento'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}
//Body EditDiscountsIncomeByid function
function EditDiscountsIncomeByid($id_descuento_ingreso,$cod_descuento_ingreso,$nombre_descuento_ingreso,$tipo,$numero_cuenta) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"UPDATE descuentos_ingresos SET cod_descuento_ingreso='$cod_descuento_ingreso', nombre_descuento_ingreso='$nombre_descuento_ingreso', tipo='$tipo', numero_cuenta='$numero_cuenta'
		   WHERE id_descuento_ingreso='$id_descuento_ingreso'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}
//Body EditDiscountsIncomeEmployeeByid function
function EditDiscountsIncomeEmployeeByid($id_descuento_ingreso_empleado, $numero_cliente, $numero_cuenta,  
									$id_descuento_ingreso, $monto_mes, $monto_periodo, $afecta_diciembre,
									$prioridad,$tipo,$frecuencia,$monto_urgente,$monto_original, $monto_pendiente,$estado,$referencia,$id_periodo,$id_usuario) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"UPDATE descuentos_ingresos_empleados SET numero_cliente='$numero_cliente',numero_cuenta='$numero_cuenta', 
			id_descuento_ingreso='$id_descuento_ingreso', monto_mes='$monto_mes', 
		   monto_periodo='$monto_periodo',afecta_diciembre='$afecta_diciembre',prioridad='$prioridad',
		   tipo='$tipo',frecuencia='$frecuencia',monto_urgente='$monto_urgente',monto_original='$monto_original',monto_pendiente='$monto_pendiente',estado='$estado',
		   referencia='$referencia',id_periodo='$id_periodo',id_usuario='$id_usuario'
		   WHERE id_descuento_ingreso_empleado='$id_descuento_ingreso_empleado'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}
//Body EditDayHolidayByid function
function EditDayHolidayByid($id_dia_feriado,$fecha_dia_feriado,$celebracion,$id_usuario) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"UPDATE dias_feriados SET fecha_dia_feriado='$fecha_dia_feriado', celebracion='$celebracion', id_usuario='$id_usuario' 
		   WHERE id_dia_feriado='$id_dia_feriado'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}
//Body EditEmployeeByid function
function EditEmployeeByid($id_empleado,$numero_empleado,$cedula,$seguro_social,$apellido,$nombre,$id_genero,$id_nacionalidad,
						$id_estado_civil,$fecha_nacimiento,$tipo_sangre,$id_estado_empleado, $id_seccion,
						$id_cargo,$horas_x_periodo, $rata_x_hora, $salario, $fecha_venc_contrato,$fecha_venc_carnet,
						$pago_efectivo,$sindicato,$clave_renta,$forma_pago,$frecuencia_pago,$fecha_ingreso, 
						$fecha_prox_vacaciones,$fecha_terminacion,$isr_gasto,$id_empresa) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"UPDATE empleados SET numero_empleado='$numero_empleado',cedula='$cedula',seguro_social='$seguro_social',
						apellido='$apellido',nombre='$nombre',id_genero='$id_genero',id_nacionalidad='$id_nacionalidad',
						id_estado_civil='$id_estado_civil',fecha_nacimiento='$fecha_nacimiento',tipo_sangre='$tipo_sangre',
						id_estado_empleado='$id_estado_empleado',id_seccion='$id_seccion',id_cargo='$id_cargo',
						horas_x_periodo='$horas_x_periodo',rata_x_hora='$rata_x_hora',salario='$salario',
						fecha_venc_contrato='$fecha_venc_contrato',fecha_venc_carnet='$fecha_venc_carnet',pago_efectivo='$pago_efectivo',
						sindicato='$sindicato',clave_renta='$clave_renta',forma_pago='$forma_pago',
						frecuencia_pago='$frecuencia_pago',fecha_ingreso='$fecha_ingreso',fecha_prox_vacaciones='$fecha_prox_vacaciones',
						fecha_terminacion='$fecha_terminacion',isr_gasto='$isr_gasto',id_empresa='$id_empresa' 
						WHERE id_empleado='$id_empleado'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}
//Body EditCompanyByid function
function EditCompanyByid($id_empresa,$nombre_empresa,$representante_legal,$direccion,$apartado_postal,$comentario,$telefono_1,$codigo_actividad) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"UPDATE empresas SET nombre_empresa='$nombre_empresa', representante_legal='$representante_legal', 
		   direccion='$direccion', apartado_postal='$apartado_postal', comentario='$comentario',telefono_1='$telefono_1', codigo_actividad=$codigo_actividad
		   WHERE id_empresa='$id_empresa'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}
//Body EditStateCivilByid function
function EditStateCivilByid($id_estado_civil,$nombre_estado_civil,$id_usuario) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"UPDATE estados_civils SET nombre_estado_civil='$nombre_estado_civil', id_usuario='$id_usuario' 
		   WHERE id_estado_civil='$id_estado_civil'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}
//Body EditStateEmployeeByid function
function EditStateEmployeeByid($id_estado_empleado,$nombre_estado_empleado,$descripcion,$id_usuario) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"UPDATE estados_empleados SET nombre_estado_empleado='$nombre_estado_empleado', descripcion='$descripcion',id_usuario='$id_usuario' 
		   WHERE id_estado_empleado='$id_estado_empleado'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}
//Body EditStateUserByid function
function EditStateUserByid($id_estado_usuario,$nombre_estado_usuario,$descripcion,$id_usuario) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"UPDATE estados_usuarios SET nombre_estado_usuario='$nombre_estado_usuario', descripcion='$descripcion',id_usuario='$id_usuario' 
		   WHERE id_estado_usuario='$id_estado_usuario'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}
//Body EditGenderByid function
function EditGenderByid($id_genero,$nombre_genero,$id_usuario) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"UPDATE generos SET nombre_genero='$nombre_genero', id_usuario='$id_usuario' 
		   WHERE id_genero='$id_genero'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}
//Body EditLegalTaxByid function
function EditLegalTaxByid($id_impuesto_legal,$segsoc,$segedu,$isr,$porcentaje_segsoc,$porcentaje_segedu,$porcentaje_isr,$estado,$id_usuario) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"UPDATE impuestos_legales SET segsoc='$segsoc',segedu='$segedu',isr='$isr',porcentaje_segsoc='$porcentaje_segsoc',porcentaje_segedu='$porcentaje_segedu',porcentaje_isr='$porcentaje_isr', estado='$estado, id_usuario='$id_usuario' 
		   WHERE id_impuesto_legal='$id_impuesto_legal'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}
//Body EditWorkingDayByid function
function EditWorkingDayByid($id_jornada,$codigo_jornada,$id_turno,$turno,$descripcion,$hora_inicia,$hora_termina,$total_horas,$paga,$id_usuario) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"UPDATE jornadas SET codigo_jornada ='$codigo_jornada',id_turno='$id_turno', turno='$turno', 
		   descripcion='$descripcion', hora_inicia='$hora_inicia', hora_termina='$hora_termina', 
		   total_horas='$total_horas', paga='$paga',id_usuario='$id_usuario'		   
		   WHERE id_jornada='$id_jornada'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}
//Body EditWorkingDayEmployeeByid function
function EditWorkingDayEmployeeByid($id_jornada_empleado,$laboro,$ausencia,$tipo,$codigo,$codigo_jornada,$com,$hora_entra,$hora_sale,$horas_regulares,$horas_extras) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"UPDATE jornadas_empleados SET laboro='$laboro', 
		   ausencia='$ausencia', tipo='$tipo', codigo='$codigo', codigo_jornada='$codigo_jornada', com='$com',
		   hora_entra='$hora_entra', hora_sale='$hora_sale', horas_regulares='$horas_regulares', horas_extras='$horas_extras'		   
		   WHERE id_jornada_empleado='$id_jornada_empleado'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}
//Body EditPeriodByid function
function EditPeriodByid($id_periodo,$anno_fiscal,$frecuencia_pago,$numero_control,$numero_periodo,$fecha_pago,$fecha_inicio,$fecha_final,$secuencia_mensual,$estatus,$id_usuario) {
    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"UPDATE periodos SET anno_fiscal='$anno_fiscal', frecuencia_pago='$frecuencia_pago', numero_control='$numero_control',
		   numero_periodo='$numero_periodo', fecha_pago='$fecha_pago', fecha_inicio='$fecha_inicio', fecha_final='$fecha_final', secuencia_mensual='$secuencia_mensual', 
		   estatus='$estatus', id_usuario='$id_usuario' 
		   WHERE id_periodo='$id_periodo'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}
//Body EditEmployeeRecordTransactionByid function
function EditEmployeeRecordTransactionByid($id_registro_transaccion_empleado,$id_empleado, $id_periodo,$horas_regular, $horas_domingo,$horas_feriado, $horas_compensatorio,
									  $horas_extra1,$horas_extra2, $horas_extra3, $horas_extra4, $horas_extra5,$horas_extra6,$horas_extra7, 
									  $horas_extra8, $horas_extra9, $horas_extra10,$factor_reg,$factor_dom, $factor_fer, $factor_com, 
									  $factor1, $factor2, $factor3, $factor4, $factor5,$factor6, $factor7, $factor8, $factor9, $factor10,
									  $horas_enferm, $horas_ajuste, $horas_ausen, $horas_certmedic, $adelanto_vacaciones) {
    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"UPDATE registros_transacciones_empleados SET id_empleado='$id_empleado', id_periodo='$id_periodo',
					horas_regular='$horas_regular', horas_domingo='$horas_domingo', 
					horas_feriado='$horas_feriado', horas_compensatorio='$horas_compensatorio',
					horas_extra1='$horas_extra1', horas_extra2='$horas_extra2', horas_extra3='$horas_extra3', horas_extra4='$horas_extra4', horas_extra5='$horas_extra5',
					horas_extra6='$horas_extra6', horas_extra7='$horas_extra7', horas_extra8='$horas_extra8', horas_extra9='$horas_extra9', horas_extra10='$horas_extra10',
					factor_reg='$factor_reg', factor_dom='$factor_dom', factor_fer='$factor_fer', factor_com='$factor_com', 
					factor1='$factor1', factor2='$factor2', factor3='$factor3', factor4='$factor4', factor5='$factor5',
					factor6='$factor6', factor7='$factor7', factor8='$factor8', factor9='$factor9', factor10='$factor10',
					horas_enferm='$horas_enferm', horas_ajuste='$horas_ajuste', horas_ausen='$horas_ausen', horas_certmedic='$horas_certmedic', adelanto_vacaciones='$adelanto_vacaciones'
					WHERE id_registro_transaccion_empleado='$id_registro_transaccion_empleado'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}


//Body EditSectionByid function
function EditSectionByid($id_seccion,$id_departamento,$nombre_seccion,$codigo_seccion,$id_usuario) {
    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"UPDATE secciones SET id_departamento='$id_departamento', nombre_seccion='$nombre_seccion',codigo_seccion='$codigo_seccion',id_usuario='$id_usuario' 
		   WHERE id_seccion='$id_seccion'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}
//Body EditUserByid function
function EditUserByid($id_usuario,$id_rol,$nombre_usuario,$pwd,$id_estado_usuario) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"UPDATE usuarios SET id_rol='$id_rol', nombre_usuario='$nombre_usuario', pwd='$pwd', id_estado_usuario='$id_estado_usuario' 
		   WHERE id_usuario='$id_usuario'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}
//Body EditBankAccountByidEmployee function
function EditBankAccountByidEmployee($id_empleado,$numero_cuenta,$id_tipo_cuenta,$nombre_tipo_cuenta,$id_banco) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"UPDATE cuentas_banco_empleados SET numero_cuenta='$numero_cuenta',id_tipo_cuenta='$id_tipo_cuenta', nombre_tipo_cuenta='$nombre_tipo_cuenta',id_banco='$id_banco'
		   WHERE id_empleado='$id_empleado'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}
//Body EditPeriod function
function EditPeriod() {
    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"UPDATE periodos SET estatus='0'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}


//Body DeleteCompanyByid function
function DeleteCompanyByid($id_empresa,$id_usuario) {
    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"UPDATE empresas SET mostrar='0'
		   WHERE id_empresa='$id_empresa'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}
//Body DeletePeriodByid function
function DeletePeriodByid($id_periodo,$id_usuario) {
    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		   
		   mysqli_query($connect,"UPDATE periodos SET mostrar='0', id_usuario='$id_usuario' 
		   WHERE id_periodo='$id_periodo'");
           $result[] = array("msg" => "OK","id" => mysqli_insert_id($connect));
	}
	else
	{
         
		  $result[] =array("msg" => "Error","id" =>0);
	}
    mysqli_close($connect);
    return $result;
}






//Body GetCompanyByid function
function GetPositionByid($id_cargo) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		 $sql="SELECT id_cargo, nombre_cargo, codigo_cargo, fecha_creacion 
		 FROM cargos
		 WHERE id_cargo='$id_cargo'";
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					  $result[] = array('id_cargo' => $id_cargo, 'nombre_cargo' => $nombre_cargo, 'codigo_cargo' => $codigo_cargo, 'fecha_creacion' => $fecha_creacion);
				}
			}
			else
			{
					  $result[] = array('id_cargo' => null, 'nombre_cargo' => null, 'codigo_cargo' => null, 'fecha_creacion' => null);
			}
			
		  

    }
    mysqli_close($connect);
    return $result;
}
//Body GetDepartmentByid function
function GetDepartmentByid($id_departamento) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		 $sql="SELECT id_departamento, nombre_departamento, codigo_departamento, fecha_creacion 
		 FROM departamentos
		 WHERE id_departamento='$id_departamento'";
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					  $result[] = array('id_departamento' => $id_departamento, 'nombre_departamento' => $nombre_departamento, 'codigo_departamento' => $codigo_departamento, 'fecha_creacion' => $fecha_creacion);
				}
			}
			else
			{
					  $result[] = array('id_departamento' => null, 'nombre_departamento' => null, 'codigo_departamento' => null, 'fecha_creacion' => null);
			}
			
		  

    }
    mysqli_close($connect);
    return $result;
}
//Body GetDiscountsIncomeByid function 
function GetDiscountsIncomeByid($id_descuento_ingreso) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		 $sql="SELECT id_descuento_ingreso, cod_descuento_ingreso, nombre_descuento_ingreso, tipo, numero_cuenta
			   FROM descuentos_ingresos 
			   WHERE id_descuento_ingreso='$id_descuento_ingreso'";
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					  $result[] = array('id_descuento_ingreso' => $id_descuento_ingreso, 'cod_descuento_ingreso' => $cod_descuento_ingreso, 'nombre_descuento_ingreso' => $nombre_descuento_ingreso, 'tipo' => $tipo,'numero_cuenta' => $numero_cuenta); 
				}
			}
			else
			{
					  $result[] = array('id_descuento_ingreso' => null, 'cod_descuento_ingreso' => null, 'nombre_descuento_ingreso' => null, 'tipo' => null,'numero_cuenta' => null);
			}

    }
    mysqli_close($connect);
    return $result;
}
//Body GetDiscountsIncomeEmployeeByid function 
function GetDiscountsIncomeEmployeeByid($id_descuento_ingreso_empleado) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		 $sql="SELECT id_descuento_ingreso_empleado, numero_cliente, numero_cuenta, id_empleado, numero_empleado, 
		 id_descuento_ingreso, monto_mes, monto_periodo, afecta_diciembre, prioridad, tipo, frecuencia, 
		 monto_urgente, monto_original, monto_pendiente, estado, referencia, id_periodo, fecha_creacion, id_usuario 
		 FROM descuentos_ingresos_empleados
		 WHERE id_descuento_ingreso_empleado='$id_descuento_ingreso_empleado'";
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					  $result[] = array('id_descuento_ingreso_empleado' => $id_descuento_ingreso_empleado, 'numero_cliente' => $numero_cliente, 
					  'numero_cliente' => $numero_cliente,'numero_cuenta' => $numero_cuenta, 'id_empleado' => $id_empleado,
					  'numero_empleado' => $numero_empleado, 'id_descuento_ingreso' => $id_descuento_ingreso, 
					  'monto_mes' => $monto_mes,'monto_periodo' => $monto_periodo, 'afecta_diciembre' => $afecta_diciembre,
					  'prioridad' => $prioridad, 'tipo' => $tipo,'frecuencia' => $frecuencia,
					  'monto_urgente' => $monto_urgente, 'monto_original' => $monto_original, 'monto_pendiente' => $monto_pendiente,  'estado' => $estado, 'referencia' => $referencia, 'id_periodo' => $id_periodo,'fecha_creacion' => $fecha_creacion,'id_usuario'=> $id_usuario); 
				}
			}
			else
			{
					 $result[] = array('id_descuento_ingreso_empleado' => null, 'numero_cliente' => null, 
					  'numero_cliente' => null,'numero_cuenta' => null, 'id_empleado' => null,
					  'numero_empleado' => null, 'id_descuento_ingreso' => null, 
					  'monto_mes' => null,'monto_periodo' => null, 'afecta_diciembre' => null,
					  'prioridad' => null, 'tipo' => null,'frecuencia' => null,
					  'monto_urgente' => null, 'monto_original' => null, 'monto_pendiente' => null,  'estado' => null, 
					  'referencia' => null, 'id_periodo' => null,'fecha_creacion' => null,'id_usuario'=> null); 
			}

    }
    mysqli_close($connect);
    return $result;
}
//Body GetDayHolidayByid function 
function GetDayHolidayByid($id_dia_feriado) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		 $sql="SELECT id_dia_feriado, fecha_dia_feriado, celebracion, fecha_creacion, id_usuario 
		 FROM dias_feriados
		 WHERE id_dia_feriado='$id_dia_feriado'";
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					  $result[] = array('id_dia_feriado' => $id_dia_feriado, 'fecha_dia_feriado' => $fecha_dia_feriado, 'celebracion' => $celebracion, 'fecha_creacion' => $fecha_creacion, 'id_usuario' => $id_usuario); 
				}
			}
			 else
			{
					 $result[] = array('id_dia_feriado' => null, 'fecha_dia_feriado' => null, 
					  'celebracion' => null, 'fecha_creacion' => null,'id_usuario' => null); 
			}

    }
    mysqli_close($connect);
    return $result;
}
//Body GetEmployeeByid function
function GetEmployeeByid($id_empleado) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		 $sql="SELECT id_empleado, numero_empleado, nombre, apellido, cedula, fecha_nacimiento, 
		 seguro_social, tipo_sangre, id_estado_empleado, id_genero, id_estado_civil, 
		 id_nacionalidad, sindicato, fecha_venc_carnet, clave_renta, forma_pago, 
		 salario, rata_x_hora, horas_x_periodo, fecha_ingreso, fecha_prox_vacaciones, 
		 fecha_venc_contrato, pago_efectivo, frecuencia_pago, isr_gasto, fecha_terminacion, 
		 id_cargo, id_seccion, id_empresa FROM empleados
		  WHERE id_empleado=$id_empleado";
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					 $result[] = array('id_empleado' =>$id_empleado,'numero_empleado'=>$numero_empleado,'cedula'=>$cedula,'seguro_social'=>$seguro_social,'apellido'=>$apellido,
										'nombre'=>$nombre,'id_genero'=>$id_genero,'id_nacionalidad'=>$id_nacionalidad,'id_estado_civil'=>$id_estado_civil,
										'fecha_nacimiento'=>$fecha_nacimiento,'tipo_sangre'=>$tipo_sangre,'id_estado_empleado'=>$id_estado_empleado,
										'id_seccion'=>$id_seccion,'id_cargo'=>$id_cargo,'horas_x_periodo'=>$horas_x_periodo,'rata_x_hora'=>$rata_x_hora,
										'salario'=>$salario,'fecha_venc_contrato'=>$fecha_venc_contrato,'fecha_venc_carnet'=>$fecha_venc_carnet,
										'pago_efectivo'=>$pago_efectivo,'sindicato'=>$sindicato,'clave_renta'=>$clave_renta,'forma_pago'=>$forma_pago,
										'frecuencia_pago'=>$frecuencia_pago,'fecha_ingreso'=>$fecha_ingreso,'fecha_prox_vacaciones'=>$fecha_prox_vacaciones,
										'fecha_terminacion'=>$fecha_terminacion,'isr_gasto'=>$isr_gasto,'id_empresa'=>$id_empresa);
				}
			}
			else
			{
					$result[] = array('id_empleado' =>null,'numero_empleado'=>null,'cedula'=>null,'seguro_social'=>null,'apellido'=>null,
										'nombre'=>null,'id_genero'=>null,'id_nacionalidad'=>null,'id_estado_civil'=>null,
										'fecha_nacimiento'=>null,'tipo_sangre'=>null,'id_estado_empleado'=>null,
										'id_seccion'=>null,'id_cargo'=>null,'horas_x_periodo'=>null,'rata_x_hora'=>null,
										'salario'=>null,'fecha_venc_contrato'=>null,'fecha_venc_carnet'=>null,
										'pago_efectivo'=>null,'sindicato'=>null,'clave_renta'=>null,'forma_pago'=>null,
										'frecuencia_pago'=>null,'fecha_ingreso'=>null,'fecha_prox_vacaciones'=>null,
										'fecha_terminacion'=>null,'isr_gasto'=>null,'id_empresa'=>null);
			}
			
		  

    }
    mysqli_close($connect);
    return $result;
}
//Body GetCompanyByid function
function GetCompanyByid($id_empresa) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		 $sql="SELECT id_empresa, nombre_empresa, representante_legal, direccion, apartado_postal, comentario, telefono_1, telefono_2, codigo_actividad, anno_proceso, mes_proceso, clave_acceso 
		 FROM empresas 
		 WHERE id_empresa='$id_empresa'";
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					  $result[] = array('id_empresa' => $id_empresa,'nombre_empresa' => $nombre_empresa,'representante_legal' => $representante_legal, 
					  'direccion' => $direccion,'apartado_postal' => $apartado_postal,'comentario' => $comentario, 
					  'telefono_1' => $telefono_1,'telefono_2' => $telefono_2,'codigo_actividad' => $codigo_actividad, 
					  'anno_proceso' => $anno_proceso,'mes_proceso' => $mes_proceso,'clave_acceso' => $clave_acceso);
				}
			}
			else
			{
					  $result[] = array('id_empresa' => null,'nombre_empresa' => null,'representante_legal' => null, 
					  'direccion' => null,'apartado_postal' => null,'comentario' => null, 
					  'telefono_1' => null,'telefono_2' => null,'codigo_actividad' => null, 
					  'anno_proceso' => null,'mes_proceso' => null,'clave_acceso' => null);
			}
			
		  

    }
    mysqli_close($connect);
    return $result;
}
//Body GetWorkingDayByid function
function GetWorkingDayByid($id_jornada) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		 $sql="SELECT id_jornada,codigo_jornada, id_turno, turno, descripcion, hora_inicia, hora_termina, total_horas, paga 
		 FROM jornadas 
		 WHERE id_jornada='$id_jornada'";
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					  $result[] = array('id_jornada' => $id_jornada,'codigo_jornada' => $codigo_jornada, 'id_turno' => $id_turno,'turno' => $turno, 
					  'descripcion' => $descripcion,'hora_inicia' => $hora_inicia, 'hora_termina' => $hora_termina,
					  'total_horas' => $total_horas, 'paga' => $paga); 
				}
			}  
		    else
			{
					 $result[] = array('id_jornada' => null,'codigo_jornada' => null, 'id_turno' => null,'turno' => null, 
					  'descripcion' => null,'hora_inicia' => null, 'hora_termina' => null,
					  'total_horas' => null, 'id_turno' => null); 
			}

    }
    mysqli_close($connect);
    return $result;
}
//Body GetWorkingDayEmployeeByid function
function GetWorkingDayEmployeeByid($id_jornada_empleado) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		 $sql="SELECT id_jornada_empleado, id_empleado, numero_empleado, fecha, dia, laboro, 
		 ausencia, tipo, codigo, codigo_jornada, com, hora_entra, hora_sale, horas_regulares, 
		 horas_extras, id_periodo, anno_fiscal 
		 FROM jornadas_empleados
		 WHERE id_jornada_empleado='$id_jornada_empleado'";
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					  $result[] = array('id_jornada_empleado' => $id_jornada_empleado, 'id_empleado' => $id_empleado,'numero_empleado' => $numero_empleado, 
					  'fecha' => $fecha,'dia' => $dia, 'laboro' => $laboro,'ausencia' => $ausencia, 'tipo' => $tipo,
					  'codigo' => $codigo,'codigo_jornada' => $codigo_jornada, 'com' => $com,'hora_entra' => $hora_entra, 
					  'hora_sale' => $hora_sale, 'horas_regulares' => $horas_regulares,'horas_extras' => $horas_extras, 'id_periodo' => $id_periodo, 'anno_fiscal' => $anno_fiscal); 
				}
			}  
		    else
			{
					 $result[] = array('id_jornada_empleado' => null, 'id_empleado' => null,'numero_empleado' => null, 
					  'fecha' => null,'dia' => null, 'laboro' =>null,'ausencia' => null, 'tipo' => null,
					  'codigo' => null,'codigo_jornada' => null, 'com' => null,'hora_entra' => null, 
					  'hora_sale' => null, 'horas_regulares' => null,'horas_extras' => null, 'id_periodo' => null, 'anno_fiscal' => null); 
			}

    }
    mysqli_close($connect);
    return $result;
}
//Body GetLegalTaxByid function 
function GetLegalTaxByid($id_impuesto_legal) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
			 $sql="SELECT id_impuesto_legal, segsoc, segedu, isr, porcentaje_segsoc, porcentaje_segedu,porcentaje_isr, estado, fecha_creacion, id_usuario 
				   FROM impuestos_legales
				   WHERE id_impuesto_legal='$id_impuesto_legal'";
			
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					 $result[] = array('id_impuesto_legal' => $id_impuesto_legal, 'segsoc' => $segsoc, 
					  'segedu' => $segedu, 'isr' => $isr,'porcentaje_segsoc' => $porcentaje_segsoc,'porcentaje_segedu' => $porcentaje_segedu, 'porcentaje_isr' => $porcentaje_isr, 
					  'estado' => $estado, 'fecha_creacion' => $fecha_creacion,'id_usuario' => $id_usuario); 
				}
			}
			 else
			{
					 $result[] = array('id_impuesto_legal' => null, 'segsoc' => null, 
					  'segedu' => null, 'isr' => null,'porcentaje_segsoc' => null,'porcentaje_segedu' => null, 'porcentaje_isr' => null, 
					  'estado' => null, 'fecha_creacion' => null,'id_usuario' => null); 
			}

    }
    mysqli_close($connect);
    return $result;
}
//Body GetSectionByid function 
function GetSectionByid($id_seccion) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		 $sql="SELECT id_seccion, secciones.id_departamento, nombre_seccion, nombre_departamento, secciones.codigo_seccion 
		 FROM secciones,departamentos 
		 WHERE departamentos.id_departamento=secciones.id_departamento AND id_seccion='$id_seccion'";
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					  $result[] = array('id_seccion' => $id_seccion, 'id_departamento' => $id_departamento, 'nombre_seccion' => $nombre_seccion, 'nombre_departamento' => $nombre_departamento,'codigo_seccion' => $codigo_seccion); 
				}
			}
			else
			{
					  $result[] = array('id_seccion' => null, 'id_departamento' => null, 'nombre_seccion' => null, 'nombre_departamento' => null,'codigo_seccion' => null);  
			}

    }
    mysqli_close($connect);
    return $result;
}
//Body GetUserByid function
function GetUserByid($id_usuario) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		 $sql="SELECT nombre_usuario, nombre_rol, pwd, nombre_estado_usuario,usuarios.id_usuario,usuarios.id_rol,usuarios.id_estado_usuario 
		 FROM usuarios,roles,estados_usuarios 
		 WHERE usuarios.id_rol=roles.id_rol 
		 AND usuarios.id_estado_usuario=estados_usuarios.id_estado_usuario
		 AND usuarios.id_usuario=$id_usuario";
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					  $result[] = array('nombre_usuario' => $nombre_usuario, 'nombre_rol' => $nombre_rol, 'pwd' => $pwd, 'nombre_estado_usuario' => $nombre_estado_usuario,'id_usuario' => $id_usuario, 'id_rol' => $id_rol,'id_estado_usuario' => $id_estado_usuario); 
				}
			}
			else
			{
					  $result[] = array('nombre_usuario' => null, 'nombre_rol' => null, 'pwd' => null, 'nombre_estado_usuario' => null,'id_usuario' => null, 'id_rol' => null,'id_estado_usuario' => null);  
			}
			
		  

    }
    mysqli_close($connect);
    return $result;
}
//Body GetUserByName function
function GetUserByName($nombre_usuario,$pwd) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		 $sql="SELECT id_usuario, id_rol, id_estado_usuario, nombre_usuario, pwd 
			   FROM usuarios
			   WHERE nombre_usuario='$nombre_usuario' AND pwd='$pwd'AND id_estado_usuario=1 ";
		 $qur=mysqli_query($connect,$sql);
		 

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					  $result[] = array('id_usuario' => $id_usuario,'id_rol' => $id_rol,'id_estado_usuario' => $id_estado_usuario,'nombre_usuario' => $nombre_usuario, 'pwd' => $pwd); 
										
				}
				 
			}
			else
			{
				 $result[] = array('id_usuario' => null,'id_rol' => null,'id_estado_usuario' => null,'nombre_usuario' => null, 'pwd' => null); 
			}
			
		  

    }
    mysqli_close($connect);
    return $result;
}
//Body GetAllEmployeeByidCompany function 
function GetEmployeeByidCompany($id_empresa) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		 $sql="SELECT id_empleado, numero_empleado, nombre, apellido, cedula, fecha_nacimiento, 
		 seguro_social, tipo_sangre, id_estado_empleado, id_genero, id_estado_civil, 
		 id_nacionalidad, sindicato, fecha_venc_carnet, clave_renta, forma_pago, 
		 salario, rata_x_hora, horas_x_periodo, fecha_ingreso, fecha_prox_vacaciones, 
		 fecha_venc_contrato, pago_efectivo, frecuencia_pago, isr_gasto, fecha_terminacion, 
		 id_cargo, id_seccion, id_empresa FROM empleados
		  WHERE id_empresa=$id_empresa";
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					 $result[] = array('id_empleado' =>$id_empleado,'numero_empleado'=>$numero_empleado,'cedula'=>$cedula,'seguro_social'=>$seguro_social,'apellido'=>$apellido,
										'nombre'=>$nombre,'id_genero'=>$id_genero,'id_nacionalidad'=>$id_nacionalidad,'id_estado_civil'=>$id_estado_civil,
										'fecha_nacimiento'=>$fecha_nacimiento,'tipo_sangre'=>$tipo_sangre,'id_estado_empleado'=>$id_estado_empleado,
										'id_seccion'=>$id_seccion,'id_cargo'=>$id_cargo,'horas_x_periodo'=>$horas_x_periodo,'rata_x_hora'=>$rata_x_hora,
										'salario'=>$salario,'fecha_venc_contrato'=>$fecha_venc_contrato,'fecha_venc_carnet'=>$fecha_venc_carnet,
										'pago_efectivo'=>$pago_efectivo,'sindicato'=>$sindicato,'clave_renta'=>$clave_renta,'forma_pago'=>$forma_pago,
										'frecuencia_pago'=>$frecuencia_pago,'fecha_ingreso'=>$fecha_ingreso,'fecha_prox_vacaciones'=>$fecha_prox_vacaciones,
										'fecha_terminacion'=>$fecha_terminacion,'isr_gasto'=>$isr_gasto,'id_empresa'=>$id_empresa);
				}
			}
			else
			{
					$result[] = array('id_empleado' =>null,'numero_empleado'=>null,'cedula'=>null,'seguro_social'=>null,'apellido'=>null,
										'nombre'=>null,'id_genero'=>null,'id_nacionalidad'=>null,'id_estado_civil'=>null,
										'fecha_nacimiento'=>null,'tipo_sangre'=>null,'id_estado_empleado'=>null,
										'id_seccion'=>null,'id_cargo'=>null,'horas_x_periodo'=>null,'rata_x_hora'=>null,
										'salario'=>null,'fecha_venc_contrato'=>null,'fecha_venc_carnet'=>null,
										'pago_efectivo'=>null,'sindicato'=>null,'clave_renta'=>null,'forma_pago'=>null,
										'frecuencia_pago'=>null,'fecha_ingreso'=>null,'fecha_prox_vacaciones'=>null,
										'fecha_terminacion'=>null,'isr_gasto'=>null,'id_empresa'=>null);
			}
			
		  

    }
    mysqli_close($connect);
    return $result;
}
//Body GetBankAccountByidEmployee function
function GetBankAccountByidEmployee($id_empleado) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		 $sql="SELECT id_cuenta_banco_empleado, cuentas_banco_empleados.id_empleado, cuentas_banco_empleados.numero_empleado, 
				CONCAT(empleados.nombre,' ',empleados.apellido) AS nombre, 
				numero_cuenta, id_tipo_cuenta, nombre_tipo_cuenta, tipo_tranferencia, id_banco 
				FROM cuentas_banco_empleados, empleados 
				WHERE cuentas_banco_empleados.id_empleado=empleados.id_empleado
				AND empleados.id_empleado='$id_empleado'";
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					  $result[] = array('id_cuenta_banco_empleado' => $id_cuenta_banco_empleado, 'id_empleado' => $id_empleado, 'numero_empleado' => $numero_empleado, 'nombre' => $nombre, 'numero_cuenta' => $numero_cuenta,'id_tipo_cuenta' => $id_tipo_cuenta, 'nombre_tipo_cuenta' => $nombre_tipo_cuenta,'tipo_tranferencia' => $tipo_tranferencia,'id_banco' => $id_banco); 
				}
			}
			else
			{
					  $result[] = array('id_cuenta_banco_empleado' => null, 'id_empleado' => null, 'numero_empleado' => null, 'nombre' => null, 'numero_cuenta' => null,'id_tipo_cuenta' => null, 'nombre_tipo_cuenta' => null,'tipo_tranferencia' => null,'id_banco' => null);  
			}
			
		  

    }
    mysqli_close($connect);
    return $result;
}
//Body GetAllDiscountsIncomeEmployeeByidEmployee function 
function GetAllDiscountsIncomeEmployeeByidEmployee($id_empleado) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		 $sql="SELECT id_descuento_ingreso_empleado, numero_cliente, numero_cuenta, id_empleado, numero_empleado, 
		 id_descuento_ingreso, monto_mes, monto_periodo, afecta_diciembre, prioridad, tipo, frecuencia, 
		 monto_urgente, monto_original, monto_pendiente, estado, referencia, fecha_creacion, id_usuario 
		 FROM descuentos_ingresos_empleados
		 WHERE id_empleado='$id_empleado'";
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					  $result[] = array('id_descuento_ingreso_empleado' => $id_descuento_ingreso_empleado, 'numero_cliente' => $numero_cliente, 
					  'numero_cliente' => $numero_cliente,'numero_cuenta' => $numero_cuenta, 'id_empleado' => $id_empleado,
					  'numero_empleado' => $numero_empleado, 'id_descuento_ingreso' => $id_descuento_ingreso, 
					  'monto_mes' => $monto_mes,'monto_periodo' => $monto_periodo, 'afecta_diciembre' => $afecta_diciembre,
					  'prioridad' => $prioridad, 'tipo' => $tipo,'frecuencia' => $frecuencia,
					  'monto_urgente' => $monto_urgente, 'monto_original' => $monto_original, 'monto_pendiente' => $monto_pendiente,  'estado' => $estado,'referencia' => $referencia,'fecha_creacion' => $fecha_creacion,'id_usuario'=> $id_usuario); 
				}
			}

    }
    mysqli_close($connect);
    return $result;
}
//Body GetPeriodByStatus function
function GetPeriodByStatus() {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		 $sql="SELECT id_periodo, anno_fiscal, frecuencia_pago, numero_control,numero_periodo, fecha_pago, fecha_inicio, fecha_final, secuencia_mensual, estatus, fecha_creacion, id_usuario 
		 FROM periodos
		 WHERE estatus=1";
		 $qur=mysqli_query($connect,$sql);
		 

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					  $result[] = array('id_periodo' => $id_periodo,'anno_fiscal' => $anno_fiscal,'frecuencia_pago' => $frecuencia_pago,'numero_control' => $numero_control,
					  'numero_periodo' => $numero_periodo, 'fecha_pago' => $fecha_pago, 'fecha_inicio' => $fecha_inicio, 
					  'fecha_final' => $fecha_final, 'secuencia_mensual' => $secuencia_mensual, 'estatus' => $estatus, 'fecha_creacion' => $fecha_creacion, 'id_usuario' => $id_usuario); 
										
				}
				 
			}
			else
			{
				 $result[] = array('id_periodo' => null,'anno_fiscal' => null,'frecuencia_pago' => null,'numero_control' => null,
					  'numero_periodo' => null, 'fecha_pago' =>null, 'fecha_inicio' => null, 
					  'fecha_final' => null, 'secuencia_mensual' => null, 'estatus' => null, 'fecha_creacion' => null, 'id_usuario' => null); 
			}
			
		  

    }
    mysqli_close($connect);
    return $result;
}
//Body GetPeriodByid function
function GetPeriodByid($id_periodo) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		 $sql="SELECT id_periodo, anno_fiscal, frecuencia_pago, numero_control,numero_periodo, fecha_pago, fecha_inicio, fecha_final, secuencia_mensual, estatus, fecha_creacion, id_usuario 
		 FROM periodos
		 WHERE id_periodo='$id_periodo' AND estatus=1";
		 $qur=mysqli_query($connect,$sql);
		 

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					  $result[] = array('id_periodo' => $id_periodo,'anno_fiscal' => $anno_fiscal,'frecuencia_pago' => $frecuencia_pago,'numero_control' => $numero_control,
					  'numero_periodo' => $numero_periodo, 'fecha_pago' => $fecha_pago, 'fecha_inicio' => $fecha_inicio, 
					  'fecha_final' => $fecha_final, 'secuencia_mensual' => $secuencia_mensual, 'estatus' => $estatus, 'fecha_creacion' => $fecha_creacion, 'id_usuario' => $id_usuario); 
										
				}
				 
			}
			else
			{
				 $result[] = array('id_periodo' => null,'anno_fiscal' => null,'frecuencia_pago' => null,'numero_control' => null,
					  'numero_periodo' => null, 'fecha_pago' =>null, 'fecha_inicio' => null, 
					  'fecha_final' => null, 'secuencia_mensual' => null, 'estatus' => null, 'fecha_creacion' => null, 'id_usuario' => null); 
			}
			
		  

    }
    mysqli_close($connect);
    return $result;
}

//Body GetWorkingDayEmployeeByPeriod function
function GetWorkingDayEmployeeByPeriod($id_empleado,$id_periodo,$anno_fiscal) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		 $sql="SELECT id_jornada_empleado, id_empleado, numero_empleado, fecha, dia, laboro, 
		 ausencia, tipo, codigo, codigo_jornada, com, hora_entra, hora_sale, horas_regulares, 
		 horas_extras, id_periodo, anno_fiscal 
		 FROM jornadas_empleados
		 WHERE id_empleado='$id_empleado' 
		 AND id_periodo='$id_periodo'
		 AND anno_fiscal='$anno_fiscal'
		 ORDER BY fecha";
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					  $result[] = array('id_jornada_empleado' => $id_jornada_empleado, 'id_empleado' => $id_empleado,'numero_empleado' => $numero_empleado, 
					  'fecha' => $fecha,'dia' => $dia, 'laboro' => $laboro,'ausencia' => $ausencia, 'tipo' => $tipo,
					  'codigo' => $codigo,'codigo_jornada' => $codigo_jornada, 'com' => $com,'hora_entra' => $hora_entra, 
					  'hora_sale' => $hora_sale, 'horas_regulares' => $horas_regulares,'horas_extras' => $horas_extras, 'id_periodo' => $id_periodo, 'anno_fiscal' => $anno_fiscal); 
				}
			}  
		    else
			{
					 $result[] = array('id_jornada_empleado' => null, 'id_empleado' => null,'numero_empleado' => null, 
					  'fecha' => null,'dia' => null, 'laboro' =>null,'ausencia' => null, 'tipo' => null,
					  'codigo' => null,'codigo_jornada' => null, 'com' => null,'hora_entra' => null, 
					  'hora_sale' => null, 'horas_regulares' => null,'horas_extras' => null, 'id_periodo' => null, 'anno_fiscal' => null); 
			}

    }
    mysqli_close($connect);
    return $result;
}
//Body GetLegalTaxesByStatus function 
function GetLegalTaxesByStatus() {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
				 $sql="SELECT id_impuesto_legal, segsoc, segedu, isr, porcentaje_segsoc, porcentaje_segedu, 
				 porcentaje_isr, estado, fecha_creacion, id_usuario 
				 FROM impuestos_legales
				 WHERE estado=1";
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					  $result[] = array('id_impuesto_legal' => $id_impuesto_legal, 'segsoc' => $segsoc, 
					  'segedu' => $segedu, 'isr' => $isr,'porcentaje_segsoc' => $porcentaje_segsoc,'porcentaje_segedu' => $porcentaje_segedu, 'porcentaje_isr' => $porcentaje_isr, 
					  'estado' => $estado, 'fecha_creacion' => $fecha_creacion,'id_usuario' => $id_usuario); 
				}
			}
			else
			{
					 $result[] = array('id_impuesto_legal' => null, 'segsoc' => null,'segedu' => null, 
					  'isr' => null,'porcentaje_segsoc' => null, 'porcentaje_segedu' =>null,'porcentaje_isr' => null, 
					  'estado' => null,'fecha_creacion' => null,'id_usuario' => null); 
			}

    }
    mysqli_close($connect);
    return $result;
}
//Body GetReceiptEmployeeByCompany function 
function GetReceiptEmployeeByCompany($id_empresa,$id_periodo) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
				 $sql="SELECT * FROM talonarios_empleados WHERE id_empresa='$id_empresa' AND id_periodo='$id_periodo'";
		 $qur=mysql_num_rows(mysql_query($sql));

			if($qur==0) {
				$result[] = array("msg" => "False","id" => 0);
			}
			else
			{
				$result[] = array("msg" => "OK","id" => 0);	
			}

    }
    mysqli_close($connect);
    return $result;
}
//Body GetEmployeesRecordsTransactionsByid function 
function GetEmployeesRecordsTransactionsByid($id_empleado) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
			 $sql="SELECT id_registro_transaccion_empleado, id_empleado, id_periodo,
			 horas_regular, horas_domingo, horas_feriado, horas_compensatorio, 
			 horas_extra1, horas_extra2, horas_extra3, horas_extra4, horas_extra5, 
			 horas_extra6, horas_extra7, horas_extra8, horas_extra9, horas_extra10, 
			 factor_reg, factor_dom, factor_fer, factor_com, 
			 factor1, factor2, factor3, factor4, factor5, 
			 factor6, factor7, factor8, factor9, factor10,
			 horas_enferm, horas_ajuste,horas_ausen, horas_certmedic, adelanto_vacaciones
			 FROM registros_transacciones_empleados   
			 WHERE id_empleado='$id_empleado'";
			
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					 $result[] = array('id_registro_transaccion_empleado' => $id_registro_transaccion_empleado, 'id_empleado' => $id_empleado, 'id_periodo' => $id_periodo,
					 'horas_regular' => $horas_regular, 'horas_domingo' => $horas_domingo, 
					  'horas_feriado' => $horas_feriado, 'horas_compensatorio' => $horas_compensatorio,
					  'horas_extra1' => $horas_extra1,'horas_extra2' => $horas_extra2, 'horas_extra3' => $horas_extra3, 'horas_extra4' => $horas_extra4, 'horas_extra5' => $horas_extra5,
					  'horas_extra6' => $horas_extra6,'horas_extra7' => $horas_extra7, 'horas_extra8' => $horas_extra8, 'horas_extra9' => $horas_extra9, 'horas_extra10' => $horas_extra10,
					  'factor_reg' => $factor_reg,'factor_dom' => $factor_dom, 'factor_fer' => $factor_fer, 'factor_com' => $factor_com, 
					  'factor1' => $factor1, 'factor2' => $factor2, 'factor3' => $factor3, 'factor4' => $factor4, 'factor5' => $factor5,
					  'factor6' => $factor6, 'factor7' => $factor7, 'factor8' => $factor8, 'factor9' => $factor9, 'factor10' => $factor10,
					   'horas_enferm' => $horas_enferm, 'horas_ajuste' => $horas_ajuste, 'horas_ausen' => $horas_ausen, 'horas_certmedic' => $horas_certmedic, 'adelanto_vacaciones' => $adelanto_vacaciones); 
				}
			}
			 else
			{
					$result[] = array('id_registro_transaccion_empleado' =>null, 'id_empleado' => null, 'id_periodo' => null,
					'horas_regular' => null, 'horas_domingo' => null, 
					  'horas_feriado' => null, 'horas_compensatorio' => null,
					  'horas_extra1' => null,'horas_extra2' => null, 'horas_extra3' => null, 'horas_extra4' => null, 'horas_extra5' => null,
					  'horas_extra6' => null,'horas_extra7' => null, 'horas_extra8' => null, 'horas_extra9' => null, 'horas_extra10' => null,
					  'factor_reg' => null,'factor_dom' => null, 'factor_fer' => null, 'factor_com' => null, 
					  'factor1' => null, 'factor2' => null, 'factor3' => null, 'factor4' => null, 'factor5' => null,
					  'factor6' => null, 'factor7' => null, 'factor8' => null, 'factor9' => null, 'factor10' => null,
					  'horas_enferm' => null, 'horas_ajuste' => null, 'horas_ausen' => null, 'horas_certmedic' => null, 'adelanto_vacaciones' => null); 
			}

    }
    mysqli_close($connect);
    return $result;
}
//Body GetInformeBankEmployeesByid function 
function GetInformeBankEmployeesByid($id_empresa,$id_periodo) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
				$sql="SELECT id_talonario_empleado,id_empleado,numero_empleado,id_periodo,id_seccion,
						nombre_seccion,nombre_departamento,nombre_empleado,apellido_empleado,cedula_empleado,id_empresa,
						nombre_empresa,horas_regular,horas_domingo,horas_feriado,horas_compensatorio,
						horas_extra1,horas_extra2,horas_extra3,horas_extra4,horas_extra5,horas_extra6,horas_extra7,horas_extra8,horas_extra9,horas_extra10,
						factor_reg,factor_dom,factor_fer,factor_com,factor1,factor2,factor3,factor4,factor5,factor6,factor7,factor8,factor9,factor10,
						horas_enferm,horas_ajuste,horas_ausen,rataxhora,claveir,seg_soc,seg_edu,
						CASE isr WHEN 0 THEN '' ELSE isr END AS isr,
						cod1,cod2,cod3,cod4,cod5,cod6,cod7,cod8,cod9,cod10,monto1,monto2,monto3,monto4,monto5,monto6,monto7,monto8,monto9,monto10,
						monto_pend1,monto_pend2,monto_pend3,monto_pend4,monto_pend5,monto_pend6,monto_pend7,monto_pend8,monto_pend9,monto_pend10,
						numero_comprobante,sal_deve_vacaciones,sal_deve_xiiimes,acu_pago_vacaciones,acu_pago_xiiimes,numero_cuenta,id_tipo_cuenta,id_banco,
						@valor_regular := ROUND(( cast(horas_regular AS DECIMAL(10,2))* cast(rataxhora AS DECIMAL(10,2)) * cast(factor_reg AS DECIMAL(10,4))),2) AS valor_regular,
						@valor_domingo := ROUND(( cast(horas_domingo AS DECIMAL(10,2))* cast(rataxhora AS DECIMAL(10,2)) * cast(factor_dom AS DECIMAL(10,4))),2) AS valor_domingo,
						@valor_feriado := ROUND(( cast(horas_feriado AS DECIMAL(10,2))* cast(rataxhora AS DECIMAL(10,2)) * cast(factor_fer AS DECIMAL(10,4))),2) AS valor_feriado,
						@valor_compensatorio := ROUND(( cast(horas_compensatorio AS DECIMAL(10,2))* cast(rataxhora AS DECIMAL(10,2)) * cast(factor_com AS DECIMAL(10,4))),2) AS valor_compensatorio,
						@valor_extra1  := ROUND(( cast(horas_extra1 AS DECIMAL(10,2))* cast(rataxhora AS DECIMAL(10,2)) * cast(factor1 AS DECIMAL(10,4))),2) AS valor_extra1,
						@valor_extra2  := ROUND(( cast(horas_extra2 AS DECIMAL(10,2))* cast(rataxhora AS DECIMAL(10,2)) * cast(factor2 AS DECIMAL(10,4))),2) AS valor_extra2,
						@valor_extra3  := ROUND(( cast(horas_extra3 AS DECIMAL(10,2))* cast(rataxhora AS DECIMAL(10,2)) * cast(factor3 AS DECIMAL(10,4))),2) AS valor_extra3,
						@valor_extra4  := ROUND(( cast(horas_extra4 AS DECIMAL(10,2))* cast(rataxhora AS DECIMAL(10,2)) * cast(factor4 AS DECIMAL(10,4))),2) AS valor_extra4,
						@valor_extra5  := ROUND(( cast(horas_extra5 AS DECIMAL(10,2))* cast(rataxhora AS DECIMAL(10,2)) * cast(factor5 AS DECIMAL(10,4))),2) AS valor_extra5,
						@valor_extra6  := ROUND(( cast(horas_extra6 AS DECIMAL(10,2))* cast(rataxhora AS DECIMAL(10,2)) * cast(factor6 AS DECIMAL(10,4))),2) AS valor_extra6,
						@valor_extra7  := ROUND(( cast(horas_extra7 AS DECIMAL(10,2))* cast(rataxhora AS DECIMAL(10,2)) * cast(factor7 AS DECIMAL(10,4))),2) AS valor_extra7,
						@valor_extra8  := ROUND(( cast(horas_extra8 AS DECIMAL(10,2))* cast(rataxhora AS DECIMAL(10,2)) * cast(factor8 AS DECIMAL(10,4))),2) AS valor_extra8,
						@valor_extra9  := ROUND(( cast(horas_extra9 AS DECIMAL(10,2))* cast(rataxhora AS DECIMAL(10,2)) * cast(factor9 AS DECIMAL(10,4))),2) AS valor_extra9,
						@valor_extra10  := ROUND(( cast(horas_extra10 AS DECIMAL(10,2))* cast(rataxhora AS DECIMAL(10,2)) * cast(factor10 AS DECIMAL(10,4))),2) AS valor_extra10,
						@valor_extra := ROUND(( @valor_extra1  + @valor_extra2 + @valor_extra3  + @valor_extra4 + @valor_extra5  + @valor_extra6 + @valor_extra7  + @valor_extra8 + @valor_extra9  + @valor_extra10 ),2) AS valor_extra,
						@total_ingresos := ROUND(( (IFNULL(@valor_regular ,0)) + (IFNULL(@valor_domingo ,0)) + (IFNULL(@valor_extra1 ,0)) + (IFNULL(@valor_extra2 ,0)) + (IFNULL(@valor_extra3 ,0)) + (IFNULL(@valor_extra4 ,0))  + (IFNULL(@valor_extra5 ,0))  + (IFNULL(@valor_extra6 ,0))  + (IFNULL(@valor_extra7 ,0)) + (IFNULL(@valor_extra8 ,0))  + (IFNULL(@valor_extra9 ,0))  + (IFNULL(@valor_extra10 ,0))  ),2) AS total_ingresos,
						@total_descuentos := ROUND(( cast(seg_soc AS DECIMAL(10,2))+ cast(seg_edu AS DECIMAL(10,2)) + cast(isr AS DECIMAL(10,2)) + cast((IFNULL(monto1 ,0)) AS DECIMAL(10,2)) + cast((IFNULL(monto2 ,0)) AS DECIMAL(10,2)) + cast((IFNULL(monto3 ,0)) AS DECIMAL(10,2)) + cast((IFNULL(monto4 ,0)) AS DECIMAL(10,2)) + cast((IFNULL(monto5 ,0)) AS DECIMAL(10,2)) + cast((IFNULL(monto6 ,0)) AS DECIMAL(10,2)) + cast((IFNULL(monto7 ,0)) AS DECIMAL(10,2)) + cast((IFNULL(monto8 ,0)) AS DECIMAL(10,2)) + cast((IFNULL(monto9 ,0)) AS DECIMAL(10,2)) + cast((IFNULL(monto10 ,0)) AS DECIMAL(10,2))),2)  AS total_descuentos,
						@salario_neto := ROUND(( @total_ingresos  - @total_descuentos ),2) AS salario_neto
						FROM
							talonarios_empleados talonarios_empleados
						WHERE id_empresa='$id_empresa' AND id_periodo='$id_periodo'";
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					  $result[] = array('id_talonario_empleado' =>$id_talonario_empleado,'id_empleado' =>$id_empleado,'numero_empleado'=>$numero_empleado,'id_periodo'=>$id_periodo,'id_seccion'=>$id_seccion,'nombre_seccion'=>$nombre_seccion,
										'nombre_departamento'=>$nombre_departamento,'nombre_empleado'=>$nombre_empleado,'apellido_empleado'=>$apellido_empleado,'cedula_empleado'=>$cedula_empleado,
										'id_empresa'=>$id_empresa,'nombre_empresa'=>$nombre_empresa,'horas_regular'=>$horas_regular,'horas_domingo'=>$horas_domingo,'horas_feriado'=>$horas_feriado,'horas_compensatorio'=>$horas_compensatorio,
										'horas_extra1'=>$horas_extra1,'horas_extra2'=>$horas_extra2,'horas_extra3'=>$horas_extra3,'horas_extra4'=>$horas_extra4,'horas_extra5'=>$horas_extra5,
										'horas_extra6'=>$horas_extra6,'horas_extra7'=>$horas_extra7,'horas_extra8'=>$horas_extra8,'horas_extra9'=>$horas_extra9,'horas_extra10'=>$horas_extra10,
										'factor_reg'=>$factor_reg,'factor_dom'=>$factor_dom,'factor_fer'=>$factor_fer,'factor_com'=>$factor_com,
										'factor1'=>$factor1,'factor2'=>$factor2,'factor3'=>$factor3,'factor4'=>$factor4,'factor5'=>$factor5,
										'factor6'=>$factor6,'factor7'=>$factor7,'factor8'=>$factor8,'factor9'=>$factor9,'factor10'=>$factor10,
										'horas_enferm'=>$horas_enferm,'horas_ajuste'=>$horas_ajuste,'horas_ausen'=>$horas_ausen,'rataxhora'=>$rataxhora,'claveir'=>$claveir,
										'seg_soc'=>$seg_soc,'seg_edu'=>$seg_edu,'isr'=>$isr,
										'cod1'=>$cod1,'cod2'=>$cod2,'cod3'=>$cod3,'cod4'=>$cod4,'cod5'=>$cod5,
										'cod6'=>$cod6,'cod7'=>$cod7,'cod8'=>$cod8,'cod9'=>$cod9,'cod10'=>$cod10,
										'monto1'=>$monto1,'monto2'=>$monto2,'monto3'=>$monto3,'monto4'=>$monto4,'monto5'=>$monto5,
										'monto6'=>$monto6,'monto7'=>$monto7,'monto8'=>$monto8,'monto9'=>$monto9,'monto10'=>$monto10,
										'monto_pend1'=>$monto_pend1,'monto_pend2'=>$monto_pend2,'monto_pend3'=>$monto_pend3,'monto_pend4'=>$monto_pend4,'monto_pend5'=>$monto_pend5,
										'monto_pend6'=>$monto_pend6,'monto_pend7'=>$monto_pend7,'monto_pend8'=>$monto_pend8,'monto_pend9'=>$monto_pend9,'monto_pend10'=>$monto_pend10,
										'numero_comprobante'=>$numero_comprobante,'sal_deve_vacaciones'=>$sal_deve_vacaciones,'sal_deve_xiiimes'=>$sal_deve_xiiimes,'acu_pago_vacaciones'=>$acu_pago_vacaciones,'acu_pago_xiiimes'=>$acu_pago_xiiimes,
										'numero_cuenta'=>$numero_cuenta,'id_tipo_cuenta'=>$id_tipo_cuenta,'id_banco'=>$id_banco,
										'valor_regular'=>$valor_regular,'valor_domingo'=>$valor_domingo,'valor_feriado'=>$valor_feriado,'valor_compensatorio'=>$valor_compensatorio,
										'valor_extra1'=>$valor_extra1,'valor_extra2'=>$valor_extra2,'valor_extra3'=>$valor_extra3,'valor_extra4'=>$valor_extra4,'valor_extra5'=>$valor_extra5,
										'valor_extra6'=>$valor_extra6,'valor_extra7'=>$valor_extra7,'valor_extra8'=>$valor_extra8,'valor_extra9'=>$valor_extra9,'valor_extra10'=>$valor_extra10,'valor_extra'=>$valor_extra,
										'total_ingresos'=>$total_ingresos,'total_descuentos'=>$total_descuentos,'salario_neto'=>$salario_neto); 
				}
			}

    }
    mysqli_close($connect);
    return $result;
}
//Body GetDayHolidayByfecha function 
function GetDayHolidayByfecha($fecha_dia_feriado) {

    $connect = mysqli_connect("localhost", "UserCaisa", "UserCaisa", "planillas");
	$result =array();
	if ($connect) {
		
		 $sql="SELECT id_dia_feriado, fecha_dia_feriado, celebracion, fecha_creacion, id_usuario 
		 FROM dias_feriados
		 WHERE fecha_dia_feriado='$fecha_dia_feriado'";
		 $qur=mysqli_query($connect,$sql);

			if(mysqli_num_rows($qur))  {
               while($row = mysqli_fetch_assoc($qur)) {
					  extract($row);
					  $result[] = array('id_dia_feriado' => $id_dia_feriado, 'fecha_dia_feriado' => $fecha_dia_feriado, 'celebracion' => $celebracion, 'fecha_creacion' => $fecha_creacion, 'id_usuario' => $id_usuario); 
				}
			}
			 else
			{
					 $result[] = array('id_dia_feriado' => null, 'fecha_dia_feriado' => null, 
					  'celebracion' => null, 'fecha_creacion' => null,'id_usuario' => null); 
			}

    }
    mysqli_close($connect);
    return $result;
}

?>