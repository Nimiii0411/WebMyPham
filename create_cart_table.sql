-- Create giohang table manually
CREATE TABLE giohang (
    id_giohang INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_nguoidung INT(11) NOT NULL,
    id_sanpham INT(11) NOT NULL,
    so_luong INT(11) NOT NULL DEFAULT 1,
    gia_tai_thoi_diem DECIMAL(12,2) NOT NULL,
    ngay_them TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    ngay_cap_nhat TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    INDEX(id_nguoidung),
    INDEX(id_sanpham),
    UNIQUE KEY giohang_unique (id_nguoidung, id_sanpham),
    
    FOREIGN KEY (id_nguoidung) REFERENCES nguoidung(id_nguoidung) ON DELETE CASCADE,
    FOREIGN KEY (id_sanpham) REFERENCES sanpham(id_sanpham) ON DELETE CASCADE
);
