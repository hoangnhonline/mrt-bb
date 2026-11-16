-- =====================================================================
-- Xóa món ăn CHƯA TỪNG ĐƯỢC BÁN (không có dòng nào trong booking_detail)
-- Lý do: nhân viên tạo trùng tên / sai tên gần đúng.
-- Chạy trên: bombay_mrt. Chạy từng bước, xem kết quả BƯỚC 1 trước khi xóa.
-- =====================================================================

SET NAMES utf8mb4;

-- BƯỚC 1. XEM TRƯỚC danh sách món sẽ bị xóa
SELECT d.id, d.name, d.price, d.category_id, d.status
FROM dish d
WHERE NOT EXISTS (SELECT 1 FROM booking_detail bd WHERE bd.dish_id = d.id)
ORDER BY d.name, d.id;

-- BƯỚC 2. SAO LƯU các món sẽ xóa (để khôi phục nếu cần)
CREATE TABLE IF NOT EXISTS dish_deleted_backup_20261116 LIKE dish;
INSERT IGNORE INTO dish_deleted_backup_20261116
SELECT d.*
FROM dish d
WHERE NOT EXISTS (SELECT 1 FROM booking_detail bd WHERE bd.dish_id = d.id);

-- BƯỚC 3. XÓA (chỉ xóa món có trong bảng sao lưu VÀ vẫn chưa được bán)
DELETE d
FROM dish d
JOIN dish_deleted_backup_20261116 bk ON bk.id = d.id
WHERE NOT EXISTS (SELECT 1 FROM booking_detail bd WHERE bd.dish_id = d.id);

-- Khôi phục nếu xóa nhầm:
-- INSERT IGNORE INTO dish SELECT * FROM dish_deleted_backup_20261116 WHERE id IN (...);
