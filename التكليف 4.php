# التكليف 4

# سام احمد الخامري

<?php
/*
bindParam ربط المتغير بالاستعلام
 اخذ القيمه اثناء التنفيذexecute()
 داخل الحلقات (loops)
مثال:
*/
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
$id = 1;
$stmt->bindParam(':id', $id);
$id = 5; 
$stmt->execute();

/*

bindValue
يربط القيمة مباشرة
مثال:
*/

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");

$id = 1;
$stmt->bindValue(':id', $id);

$id = 5; 
$stmt->execute();


/*
(Critical Scenario)
*/
$pdo->exec("UPDATE accounts SET balance = balance - 100 WHERE id = 1");
$pdo->exec("UPDATE accounts SET balance = balance + 100 WHERE id = 2");

// Transactions

try {
    $pdo->beginTransaction();

    $stmt1 = $pdo->prepare(
        "UPDATE accounts SET balance = balance - :amount WHERE id = :from"
    );
    $stmt1->bindValue(':amount', 100);
    $stmt1->bindValue(':from', 1);
    $stmt1->execute();

    $stmt2 = $pdo->prepare(
        "UPDATE accounts SET balance = balance + :amount WHERE id = :to"
    );
    $stmt2->bindValue(':amount', 100);
    $stmt2->bindValue(':to', 2);
    $stmt2->execute();

    $pdo->commit(); // تأكيد العمليات
} catch (Exception $e) {
    $pdo->rollBack(); // إلغاء كل شيء
}

?>
