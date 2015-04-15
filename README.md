# form
Small form component

Example:
```
    $AllInclForm = new Swobble\Form\AllInclForm();
    
    $form = $AllInclForm->create(array(
        //'action' => 'https://custom-url.com',
        'method' => 'GET'
    ));
    
    $form->add('input', array());
    $form->add('textarea', array());
    
    echo $AllInclForm->close($form);
```
