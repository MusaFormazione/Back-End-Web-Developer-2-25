<?php 
include './includes/header.php'; 
require_once INCLUDES_PATH . '/FormBuilder.php';

$form = new FormBuilder(INCLUDES_PATH .'/CRUD/create.php','POST',[
    [
        'type' => 'text',
        'name' => 'gusto',
        'placeholder' => 'Gusto'
    ],
    [
        'type' => 'number',
        'name' => 'prezzo',
        'placeholder' => 'Prezzo'
    ],
    [
        'type' => 'select',
        'options' => [
            [
                "si" => 1,
                "no" => 0,
            ]
        ],
        'name' => 'disponibile',
        'placeholder' => ''
    ]
]);
?>

<?php $form->render();?>
<?php include './includes/footer.php'; ?>