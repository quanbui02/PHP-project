<?php 

function convertDateTime($datetime) {
    // Chuyển đổi chuỗi thời gian vào đối tượng DateTime
    $datetimeObj = DateTime::createFromFormat('Y-m-d H:i:s.u', $datetime);

    // Kiểm tra nếu chuyển đổi thành công
    if ($datetimeObj) {
        // Trích xuất ngày, tháng, năm và giờ
        $date = $datetimeObj->format('d - m - Y');
        $time = $datetimeObj->format('H:i:s');

        // Hiển thị kết quả
        return 'Ngày: ' . $date . ' Giờ: ' . $time ;
    } else {
        return 'Thời gian không hợp lệ.';
    }
}

?>