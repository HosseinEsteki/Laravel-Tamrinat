<?php
/**
 * @param $type
 * success|danger|warning
 * @return void
 */
function message($type = 'success')
{
    $type= mb_strtolower($type);
    $message='';
    switch ($type){
        case 'success':
            $message="اطلاعات با موفقیت افزوده شد";
            break;
        case 'danger':
            $message="اطلاعات با موفقیت حذف شد";
            break;
        case 'warning':
            $message="اطلاعات با موفقیت ویرایش شد";
            break;
        default:
            return;
    }
    session()->flash('mess',$message);
    session()->flash('mess-type',$type);
}
enum PhotoPath:string{
    case User="/images/users/";
    case Post="/images/posts/";
}
