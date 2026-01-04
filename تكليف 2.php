
# سام احمد الخامري

<?php
$file = fopen("test.txt", "r");
/*
r قراءة
w كتابة (يمسح المحتوى)
a إضافة
r+ قراءة وكتابة
قراءة ملف
*/
$content = fread($file, filesize("test.txt"));


while (!feof($file)) {
    echo fgets($file);
}

$file = fopen("test.txt", "w");
fwrite($file, "Hello PHP");

fclose($file);

file_get_contents("test.txt");
file_put_contents("test.txt", "Hello");

file_exists("test.txt");
is_file("test.txt");
filesize("test.txt");

unlink("test.txt");
copy("a.txt", "b.txt");
rename("old.txt", "new.txt");

#(Timestamp)
time();

# عرض التاريخ
echo date("Y-m-d");

/*

Y السنة
m الشهر
d اليوم
H الساعة
i الدقيقة
s الثانية


مثال:
*/
echo date("Y-m-d H:i:s");

# تحويل نص إلى وقت
strtotime("2026-01-01");
strtotime("+1 day");
strtotime("-2 hours");

# وقت يدويًا
mktime(10, 30, 0, 1, 1, 2026);

#  (DateTime)
$date = new DateTime();
echo $date->format("Y-m-d H:i:s");

#(Timezone)
date_default_timezone_set("Asia/Aden");


# المنطقة الحالية
echo date_default_timezone_get();

# Timezone مع DateTime
$timezone = new DateTimeZone("Asia/Aden");
$date = new DateTime("now", $timezone);
echo $date->format("Y-m-d H:i:s");

# تغيير المنطقة الزمنية لكائن موجود
$date->setTimezone(new DateTimeZone("UTC"));
?>