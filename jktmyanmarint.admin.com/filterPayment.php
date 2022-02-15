<?php
header('Content-Type: application/json');

include("confs/config.php");

// $sqlQuery = "SELECT student_id,student_name,marks FROM tbl_marks ORDER BY student_id";
$filteredByTime = $_POST["filteredByTime"];
$filteredByBanking = $_POST["filteredByBanking"];
$is_pending = $_POST["is_pending"];
if (isset($is_pending)) {
    switch ($filteredByBanking) {
        case "AYA Bank": {
                switch ($filteredByTime) {
                    case "1": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'AYA Bank' AND p.created_at > now() - INTERVAL 7 DAY ORDER BY p.created_at DESC;
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                        }
                        break;
                    case "2": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'AYA Bank' AND p.created_at > now() - INTERVAL 30 DAY ORDER BY p.created_at DESC;
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                        }
                        break;
                    case "3": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'AYA Bank' AND p.created_at > now() - INTERVAL 3 MONTH ORDER BY p.created_at DESC
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                        }
                        break;
                    case "4": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'AYA Bank' AND p.created_at > now() - INTERVAL 6 MONTH ORDER BY p.created_at DESC;
                            ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                        }
                        break;
                    default: {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'AYA Bank' ORDER BY p.created_at DESC;
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                        }
                        break;
                }
            }
            break;
        case "KBZ Bank": {
                switch ($filteredByTime) {
                    case "1": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'KBZ Bank' AND p.created_at > now() - INTERVAL 7 DAY ORDER BY p.created_at DESC;
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "2": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'KBZ Bank' AND p.created_at > now() - INTERVAL 30 DAY ORDER BY p.created_at DESC;
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "3": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'KBZ Bank' AND p.created_at > now() - INTERVAL 3 MONTH ORDER BY p.created_at DESC
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "4": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'KBZ' AND p.created_at > now() - INTERVAL 6 MONTH ORDER BY p.created_at DESC;
                            ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    default: {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'KBZ' ORDER BY p.created_at DESC;
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                }
            }
            break;
        case "CB Bank": {
                switch ($filteredByTime) {
                    case "1": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'CB Bank' AND p.created_at > now() - INTERVAL 7 DAY ORDER BY p.created_at DESC;
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "2": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'CB Bank' AND p.created_at > now() - INTERVAL 30 DAY ORDER BY p.created_at DESC;
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "3": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'CB Bank' AND p.created_at > now() - INTERVAL 3 MONTH ORDER BY p.created_at DESC
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "4": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'CB Bank' AND p.created_at > now() - INTERVAL 6 MONTH ORDER BY p.created_at DESC;
                            ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    default: {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'CB Bank' ORDER BY p.created_at DESC;
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                }
            }
            break;
        case "UAB Bank": {
                switch ($filteredByTime) {
                    case "1": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'UAB Bank' AND p.created_at > now() - INTERVAL 7 DAY ORDER BY p.created_at DESC;
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "2": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'UAB Bank' AND p.created_at > now() - INTERVAL 30 DAY ORDER BY p.created_at DESC;
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "3": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'UAB Bank' AND p.created_at > now() - INTERVAL 3 MONTH ORDER BY p.created_at DESC
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "4": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'UAB Bank' AND p.created_at > now() - INTERVAL 6 MONTH ORDER BY p.created_at DESC;
                            ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    default: {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'UAB Bank' ORDER BY p.created_at DESC;
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                }
            }
            break;
        case "Shwe Bank": {
                switch ($filteredByTime) {
                    case "1": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'Shwe Bank' AND p.created_at > now() - INTERVAL 7 DAY ORDER BY p.created_at DESC;
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "2": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'Shwe Bank' AND p.created_at > now() - INTERVAL 30 DAY ORDER BY p.created_at DESC;
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "3": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'Shwe Bank' AND p.created_at > now() - INTERVAL 3 MONTH ORDER BY p.created_at DESC
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "4": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'Shwe Bank' AND p.created_at > now() - INTERVAL 6 MONTH ORDER BY p.created_at DESC;
                            ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    default: {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'Shwe Bank' ORDER BY p.created_at DESC;
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                }
            }
            break;
        case "A Bank": {
                switch ($filteredByTime) {
                    case "1": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'A Bank' AND p.created_at > now() - INTERVAL 7 DAY ORDER BY p.created_at DESC;
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "2": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'A Bank' AND p.created_at > now() - INTERVAL 30 DAY ORDER BY p.created_at DESC;
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "3": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'A Bank' AND p.created_at > now() - INTERVAL 3 MONTH ORDER BY p.created_at DESC
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "4": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'A Bank' AND p.created_at > now() - INTERVAL 6 MONTH ORDER BY p.created_at DESC;
                            ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    default: {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'A Bank' ORDER BY p.created_at DESC;
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                }
            }
            break;
        case "AYA Pay": {
                switch ($filteredByTime) {
                    case "1": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'AYA Pay' AND p.created_at > now() - INTERVAL 7 DAY ORDER BY p.created_at DESC;
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "2": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'AYA Pay' AND p.created_at > now() - INTERVAL 30 DAY ORDER BY p.created_at DESC;
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "3": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'AYA Pay' AND p.created_at > now() - INTERVAL 3 MONTH ORDER BY p.created_at DESC
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "4": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'AYA Pay' AND p.created_at > now() - INTERVAL 6 MONTH ORDER BY p.created_at DESC;
                            ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    default: {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'AYA Pay' ORDER BY p.created_at DESC;
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                }
            }
            break;
        case "KBZ Pay": {
                switch ($filteredByTime) {
                    case "1": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'KBZ Pay' AND p.created_at > now() - INTERVAL 7 DAY ORDER BY p.created_at DESC;
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "2": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'KBZ Pay' AND p.created_at > now() - INTERVAL 30 DAY ORDER BY p.created_at DESC;
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "3": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'KBZ Pay' AND p.created_at > now() - INTERVAL 3 MONTH ORDER BY p.created_at DESC
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "4": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'KBZ Pay' AND p.created_at > now() - INTERVAL 6 MONTH ORDER BY p.created_at DESC;
                            ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    default: {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'KBZ Pay' ORDER BY p.created_at DESC;
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                }
            }
            break;
        case "CB Pay": {
                switch ($filteredByTime) {
                    case "1": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'CB Pay' AND p.created_at > now() - INTERVAL 7 DAY ORDER BY p.created_at DESC;
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "2": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'CB Pay' AND p.created_at > now() - INTERVAL 30 DAY ORDER BY p.created_at DESC;
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "3": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'CB Pay' AND p.created_at > now() - INTERVAL 3 MONTH ORDER BY p.created_at DESC
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "4": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'CB Pay' AND p.created_at > now() - INTERVAL 6 MONTH ORDER BY p.created_at DESC;
                            ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    default: {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'CB Pay' ORDER BY p.created_at DESC;
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                }
            }
            break;
        case "Wave Money": {
                switch ($filteredByTime) {
                    case "1": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'Wave Money' AND p.created_at > now() - INTERVAL 7 DAY ORDER BY p.created_at DESC;
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "2": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'Wave Money' AND p.created_at > now() - INTERVAL 30 DAY ORDER BY p.created_at DESC;
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "3": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'Wave Money' AND p.created_at > now() - INTERVAL 3 MONTH ORDER BY p.created_at DESC
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "4": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'Wave Money' AND p.created_at > now() - INTERVAL 6 MONTH ORDER BY p.created_at DESC;
                            ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    default: {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND b.bank_name = 'Wave Money' ORDER BY p.created_at DESC;
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                }
            }
            break;
        default: {
                switch ($filteredByTime) {
                    case "1": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND p.created_at > now() - INTERVAL 7 DAY ORDER BY p.created_at DESC;
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "2": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND p.created_at > now() - INTERVAL 30 DAY ORDER BY p.created_at DESC;
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "3": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND p.created_at > now() - INTERVAL 3 MONTH ORDER BY p.created_at DESC
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "4": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        AND p.created_at > now() - INTERVAL 6 MONTH ORDER BY p.created_at DESC;
                            ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    default: {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                        p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                        WHERE p.is_pending=1 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                        ORDER BY p.created_at DESC;
                                    ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                }
            }
            break;
    }
} else {
    switch ($filteredByBanking) {
        case "AYA Bank": {
                switch ($filteredByTime) {
                    case "1": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'AYA Bank' AND p.created_at > now() - INTERVAL 7 DAY ORDER BY p.created_at DESC;
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "2": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'AYA Bank' AND p.created_at > now() - INTERVAL 30 DAY ORDER BY p.created_at DESC;
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "3": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'AYA Bank' AND p.created_at > now() - INTERVAL 3 MONTH ORDER BY p.created_at DESC
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "4": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'AYA Bank' AND p.created_at > now() - INTERVAL 6 MONTH ORDER BY p.created_at DESC;
                                ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    default: {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'AYA Bank' ORDER BY p.created_at DESC;
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                }
            }
            break;
        case "KBZ Bank": {
                switch ($filteredByTime) {
                    case "1": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'KBZ Bank' AND p.created_at > now() - INTERVAL 7 DAY ORDER BY p.created_at DESC;
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "2": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'KBZ Bank' AND p.created_at > now() - INTERVAL 30 DAY ORDER BY p.created_at DESC;
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "3": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'KBZ Bank' AND p.created_at > now() - INTERVAL 3 MONTH ORDER BY p.created_at DESC
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "4": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'KBZ Bank' AND p.created_at > now() - INTERVAL 6 MONTH ORDER BY p.created_at DESC;
                                ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    default: {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'KBZ Bank' ORDER BY p.created_at DESC;
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                }
            }
            break;
        case "CB Bank": {
                switch ($filteredByTime) {
                    case "1": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'CB Bank' AND p.created_at > now() - INTERVAL 7 DAY ORDER BY p.created_at DESC;
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "2": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'CB Bank' AND p.created_at > now() - INTERVAL 30 DAY ORDER BY p.created_at DESC;
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "3": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'CB Bank' AND p.created_at > now() - INTERVAL 3 MONTH ORDER BY p.created_at DESC
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "4": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'CB Bank' AND p.created_at > now() - INTERVAL 6 MONTH ORDER BY p.created_at DESC;
                                ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    default: {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'CB Bank' ORDER BY p.created_at DESC;
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                }
            }
            break;
        case "UAB Bank": {
                switch ($filteredByTime) {
                    case "1": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'UAB Bank' AND p.created_at > now() - INTERVAL 7 DAY ORDER BY p.created_at DESC;
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "2": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'UAB Bank' AND p.created_at > now() - INTERVAL 30 DAY ORDER BY p.created_at DESC;
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "3": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'UAB Bank' AND p.created_at > now() - INTERVAL 3 MONTH ORDER BY p.created_at DESC
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "4": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'UAB Bank' AND p.created_at > now() - INTERVAL 6 MONTH ORDER BY p.created_at DESC;
                                ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    default: {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'UAB Bank' ORDER BY p.created_at DESC;
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                }
            }
            break;
        case "Shwe Bank": {
                switch ($filteredByTime) {
                    case "1": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'Shwe Bank' AND p.created_at > now() - INTERVAL 7 DAY ORDER BY p.created_at DESC;
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "2": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'Shwe Bank' AND p.created_at > now() - INTERVAL 30 DAY ORDER BY p.created_at DESC;
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "3": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'Shwe Bank' AND p.created_at > now() - INTERVAL 3 MONTH ORDER BY p.created_at DESC
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "4": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'Shwe Bank' AND p.created_at > now() - INTERVAL 6 MONTH ORDER BY p.created_at DESC;
                                ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    default: {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'Shwe Bank' ORDER BY p.created_at DESC;
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                }
            }
            break;
        case "A Bank": {
                switch ($filteredByTime) {
                    case "1": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'A Bank' AND p.created_at > now() - INTERVAL 7 DAY ORDER BY p.created_at DESC;
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "2": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'A Bank' AND p.created_at > now() - INTERVAL 30 DAY ORDER BY p.created_at DESC;
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "3": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'A Bank' AND p.created_at > now() - INTERVAL 3 MONTH ORDER BY p.created_at DESC
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "4": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'A Bank' AND p.created_at > now() - INTERVAL 6 MONTH ORDER BY p.created_at DESC;
                                ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    default: {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'A Bank' ORDER BY p.created_at DESC;
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                }
            }
            break;
        case "AYA Pay": {
                switch ($filteredByTime) {
                    case "1": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'AYA Pay' AND p.created_at > now() - INTERVAL 7 DAY ORDER BY p.created_at DESC;
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "2": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'AYA Pay' AND p.created_at > now() - INTERVAL 30 DAY ORDER BY p.created_at DESC;
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "3": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'AYA Pay' AND p.created_at > now() - INTERVAL 3 MONTH ORDER BY p.created_at DESC
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "4": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'AYA Pay' AND p.created_at > now() - INTERVAL 6 MONTH ORDER BY p.created_at DESC;
                                ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    default: {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'AYA Pay' ORDER BY p.created_at DESC;
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                }
            }
            break;
        case "KBZ Pay": {
                switch ($filteredByTime) {
                    case "1": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'KBZ Pay' AND p.created_at > now() - INTERVAL 7 DAY ORDER BY p.created_at DESC;
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "2": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'KBZ Pay' AND p.created_at > now() - INTERVAL 30 DAY ORDER BY p.created_at DESC;
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "3": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'KBZ Pay' AND p.created_at > now() - INTERVAL 3 MONTH ORDER BY p.created_at DESC
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "4": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'KBZ Pay' AND p.created_at > now() - INTERVAL 6 MONTH ORDER BY p.created_at DESC;
                                ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    default: {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'KBZ Pay' ORDER BY p.created_at DESC;
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                }
            }
            break;
        case "CB Pay": {
                switch ($filteredByTime) {
                    case "1": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'CB Pay' AND p.created_at > now() - INTERVAL 7 DAY ORDER BY p.created_at DESC;
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "2": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'CB Pay' AND p.created_at > now() - INTERVAL 30 DAY ORDER BY p.created_at DESC;
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "3": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'CB Pay' AND p.created_at > now() - INTERVAL 3 MONTH ORDER BY p.created_at DESC
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "4": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'CB Pay' AND p.created_at > now() - INTERVAL 6 MONTH ORDER BY p.created_at DESC;
                                ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    default: {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'CB Pay' ORDER BY p.created_at DESC;
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                }
            }
            break;
        case "Wave Money": {
                switch ($filteredByTime) {
                    case "1": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'Wave Money' AND p.created_at > now() - INTERVAL 7 DAY ORDER BY p.created_at DESC;
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "2": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'Wave Money' AND p.created_at > now() - INTERVAL 30 DAY ORDER BY p.created_at DESC;
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "3": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'Wave Money' AND p.created_at > now() - INTERVAL 3 MONTH ORDER BY p.created_at DESC
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "4": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'Wave Money' AND p.created_at > now() - INTERVAL 6 MONTH ORDER BY p.created_at DESC;
                                ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    default: {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND b.bank_name = 'Wave Money' ORDER BY p.created_at DESC;
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                }
            }
            break;
        default: {
                switch ($filteredByTime) {
                    case "1": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND p.created_at > now() - INTERVAL 7 DAY ORDER BY p.created_at DESC;
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "2": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND p.created_at > now() - INTERVAL 30 DAY ORDER BY p.created_at DESC;
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "3": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND p.created_at > now() - INTERVAL 3 MONTH ORDER BY p.created_at DESC
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    case "4": {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            AND p.created_at > now() - INTERVAL 6 MONTH ORDER BY p.created_at DESC;
                                ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                    default: {
                            $sqlQuery = "SELECT payment_id, student_name, title, level_or_sub, bank_name, payment_amount, 
                                            p.created_at AS created_at FROM payments p, students s, enrollments e, courses c, banking_info b 
                                            WHERE p.is_pending=0 AND e.student_id = s.student_id AND p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                            ORDER BY p.created_at DESC;
                                        ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                        }
                        break;
                }
            }
            break;
    }
}

echo json_encode($data);
