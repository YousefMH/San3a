<?php
// دالة للتحقق من صحة الاسم
function validateName($name) {
    if (empty($name)) {
        return "الاسم مطلوب.";
    } elseif (strlen($name) < 3) {
        return "الاسم يجب أن يكون أكبر من 3 حروف.";
    } else {
        return null;
    }
}
function validatFirstName($fname) {
    if (empty($name)) {
        return "الاسم مطلوب.";
    } elseif (strlen($fname) < 3) {
        return "الاسم يجب أن يكون أكبر من 3 حروف.";
    } else {
        return null;
    }
}
function validateListName($sname) {
    if (empty($sname)) {
        return "الاسم مطلوب.";
    } elseif (strlen($sname) < 3) {
        return "الاسم يجب أن يكون أكبر من 3 حروف.";
    } else {
        return null;
    }
}

// دالة للتحقق من صحة البريد الإلكتروني
function validateEmail($email) {
    if (empty($email)) {
        return "البريد الإلكتروني مطلوب.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "البريد الإلكتروني غير صالح.";
    } else {
        return null;
    }
}

// دالة للتحقق من صحة رقم الهاتف
function validatePhoneNumber($phone) {
    if (empty($phone)) {
        return "رقم الهاتف مطلوب.";
    } elseif (!preg_match('/^[0-9]{11}$/', $phone)) {
        return "رقم الهاتف يجب أن يتكون من 11 رقمًا.";
    } else {
        return null;
    }
}

// دالة للتحقق من صحة الرقم القومي
function validateNationalID($NationalID) {
    if (empty($NationalID)) {
        return "الرقم القومي مطلوب.";
    } elseif (!preg_match('/^[0-9]{14}$/', $NationalID)) {
        return "الرقم القومي يجب أن يتكون من 14 رقمًا.";
    } else {
        return null;
    }
}

// دالة للتحقق من صحة التاريخ
function validateDate($date) {
    $date_format = 'Y-m-d';
    $d = DateTime::createFromFormat($date_format, $date);
    if (!$d || $d->format($date_format) !== $date) {
        return "التاريخ غير صالح.";
    } else {
        return null;
    }
}

// دالة عامة للتحقق من القيم بناءً على اسم الحقل
function validateInput($field, $value) {
    $errors = [];

    switch ($field) {
        case 'name':
            $errors[] = validateName($value);
            break;
        case 'fname':
            $errors[] = validateName($value);
            break;
        case 'sname':
            $errors[] = validateName($value);
            break;
        case 'email':
            $errors[] = validateEmail($value);
            break;
        case 'phone':
            $errors[] = validatePhoneNumber($value);
            break;
        case 'NationalID':
            $errors[] = validateNationalID($value);
            break;
        case 'date':
            $errors[] = validateDate($value);
            break;
        default:
            break;
    }

    // إزالة العناصر التي لا تحتوي على خطأ (null)
    return array_filter($errors);
}

// مصفوفات القيم والأخطاء
$errors = [
    'name' => '',
    'fname' => '',
    'sname' => '',
    'phone' => '',
    'email' => '',
    'date' => '',
    'NationalID' => '',
];

$values = [
    'name' => '',
    'fname' => '',
    'sname' => '',
    'phone' => '',
    'email' => '',
    'date' => '',
    'NationalID' => '',
];

$submit_message = '';

// تنفيذ عند الضغط على زر الإرسال
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    foreach ($values as $field => $v) {
        $values[$field] = $_POST[$field] ?? '';
        $error = validateInput($field, $values[$field]);
        $errors[$field] = $error ? implode(', ', $error) : '';
    }

    if (!array_filter($errors)) {
        $submit_message = "تم الإرسال بنجاح!";
        // هنا تقدر تدخل البيانات إلى قاعدة البيانات أو ترسل بريد
    }
}
?>
