<?php var_dump($companies);
echo ('-/-');

foreach ($companies as $entreprises)
{
    foreach ($cities as $ville)
    {
        if($ville['name'] == $entreprises['city'])
        {
            var_dump($ville);
            break;
        }
    }
}
?>