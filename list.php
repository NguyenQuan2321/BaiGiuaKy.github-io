<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Nhân Viên</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            border: 2px solid #000; 
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2; 
            color: black; 
        }

        th:first-child {
            background-color: #f2f2f2; 
            color: black; 
        }

        img {
            width: 20px;
            height: 20px;
        }
    </style>
</head>
<body>

<?php
    
    require_once 'connect.php';

    // Xác định trang hiện tại
    $page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

    
    // Số nhân viên mỗi trang
    $records_per_page = 5;

    // Tính toán offset
    $offset = ($page - 1) * $records_per_page;

    // Truy vấn CSDL với giới hạn và phân trang
    $sql = "SELECT * FROM NHANVIEN LIMIT $offset, $records_per_page";
    $result = $conn->query($sql);

    
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Mã Nhân Viên</th>";
        echo "<th>Tên Nhân Viên</th>";
        echo "<th>Giới Tính</th>";
        echo "<th>Nơi Sinh</th>";
        echo "<th>Tên Phòng</th>";
        echo "<th>Lương</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["Ma_NV"] . "</td>";
            echo "<td>" . $row["Ten_NV"] . "</td>";
            echo "<td>";
            // Kiểm tra giới tính để chèn hình ảnh tương ứng
            if ($row["Phai"] == "NU") {
                echo "<img src='woman.jpg' alt='Woman'>";
            } else {
                echo "<img src='man.jpg' alt='Man'>";
            }
            echo "</td>";
            echo "<td>" . $row["Noi_Sinh"] . "</td>";
            echo "<td>" . $row["Ma_Phong"] . "</td>";
            echo "<td>" . $row["Luong"] . "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";

        // Tạo link phân trang
        $sql = "SELECT COUNT(*) AS total FROM NHANVIEN";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $total_pages = ceil($row["total"] / $records_per_page);

        echo "<div>";
        for ($i = 1; $i <= $total_pages; $i++) {
            echo "<a href='?page=$i'>$i</a> ";
        }
        echo "</div>";
        
    } else {
        echo "Không có dữ liệu";
    }

    // Đóng kết nối
    $conn->close();
?>

</body>
</html>
