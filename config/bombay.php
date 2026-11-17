<?php
/*
| Cấu hình nghiệp vụ nhà hàng Bombay (14/11/2026)
*/
return [
    // Thuế VAT (%) cộng thêm trên (tổng bill − giảm giá), trừ bill tick "KHÔNG VAT"
    'vat_rate' => 8,
    // Chi nhánh KHÔNG tính VAT (bill đồng bộ từ Sapo): 12 = Vui Fest
    'no_vat_branches' => [12],
    // Chi nhánh dùng màn hình bếp (BẾP / CURRY / BÁNH). MRT (Mây Rút Trong) không dùng bếp: 0 = tắt, bill lưu xong là hoàn tất
    'kitchen_branch_id' => 0,
    // Hoa hồng đối tác mặc định (dùng khi chưa có cài đặt trong bảng settings)
    'com_alacarte_pct_default' => 15,
    'com_buffet_per_pax_default' => 20000,
    // Hoa hồng buffet trẻ em (món buffet có chữ "TE"), đ/khách — áp dụng chung mọi đối tác
    'com_buffet_child_per_pax_default' => 10000,
];
