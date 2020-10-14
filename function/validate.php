<?php
function IsNotEmpty($value)
{
    if(!empty($value))
        return true;
    else
        return false;
}
function ValidEmail($email)
{
    if(filter_var($email,FILTER_VALIDATE_EMAIL))
        return true;
    else
        return false;
}
