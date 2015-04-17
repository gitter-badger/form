# form

[![Join the chat at https://gitter.im/coders-club/form](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/coders-club/form?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
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
