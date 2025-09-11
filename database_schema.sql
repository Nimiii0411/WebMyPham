-- =============================================
-- COSMETIC WEB DATABASE SCHEMA
-- Generated: September 10, 2025
-- =============================================

-- TABLE: chitietdonhang
-- Lưu chi tiết từng sản phẩm trong đơn hàng
CREATE TABLE chitietdonhang (
    id_chitiet INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_donhang INT(11) NOT NULL,
    id_sanpham INT(11) NOT NULL,
    so_luong INT(11) NOT NULL,
    gia DECIMAL(12,2) NOT NULL,
    
    INDEX(id_donhang),
    INDEX(id_sanpham)
);

-- TABLE: danhgia  
-- Lưu đánh giá của khách hàng về sản phẩm
CREATE TABLE danhgia (
    id_danhgia INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_nguoidung INT(11) NOT NULL,
    id_sanpham INT(11) NOT NULL,
    diem_danh_gia INT(11) NOT NULL,
    noi_dung VARCHAR(1000) NULL,
    ngay_danh_gia TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    
    INDEX(id_nguoidung),
    INDEX(id_sanpham),
    INDEX(diem_danh_gia)
);

-- TABLE: donhang
-- Lưu thông tin đơn hàng
CREATE TABLE donhang (
    id_donhang INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_nguoidung INT(11) NOT NULL,
    tong_tien DECIMAL(12,2) NOT NULL,
    trang_thai ENUM('pending','confirmed','shipping','delivered','cancelled') DEFAULT 'pending',
    dia_chi_giao VARCHAR(500) NOT NULL,
    ghi_chu VARCHAR(500) NULL,
    ngay_dat TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    ngay_cap_nhat TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    INDEX(id_nguoidung),
    INDEX(trang_thai)
);

-- TABLE: loaisanpham
-- Danh mục loại sản phẩm (Skincare, Makeup, etc.)
CREATE TABLE loaisanpham (
    id_loai INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ten_loai VARCHAR(100) NOT NULL,
    mota VARCHAR(255) NULL,
    ngay_tao TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- TABLE: nguoidung
-- Thông tin tài khoản người dùng  
CREATE TABLE nguoidung (
    id_nguoidung INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ten_nguoidung VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    mat_khau VARCHAR(255) NOT NULL,
    so_dien_thoai VARCHAR(15) NULL,
    dia_chi VARCHAR(255) NULL,
    ngay_sinh DATE NULL,
    gioi_tinh ENUM('Nam','Nữ','Khác') NULL,
    loai_nguoidung ENUM('admin','customer') DEFAULT 'customer',
    ngay_tao TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    ngay_cap_nhat TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- TABLE: sanpham
-- Thông tin sản phẩm mỹ phẩm
CREATE TABLE sanpham (
    id_sanpham INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ten_sanpham VARCHAR(200) NOT NULL,
    mota VARCHAR(1000) NULL,
    gia DECIMAL(12,2) NOT NULL,
    so_luong INT(11) DEFAULT 0,
    dungtich VARCHAR(50) NULL,
    thanh_phan VARCHAR(1000) NULL,
    huong_dan_su_dung VARCHAR(1000) NULL,
    id_loai INT(11) NOT NULL,
    id_thuonghieu INT(11) NOT NULL,
    hinh_anh VARCHAR(255) NULL,
    ngay_tao TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    ngay_cap_nhat TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    INDEX(id_loai),
    INDEX(id_thuonghieu)
);

-- TABLE: sanpham_skintype
-- Bảng trung gian: Sản phẩm phù hợp với loại da nào
CREATE TABLE sanpham_skintype (
    id_sanpham INT(11) NOT NULL,
    id_skin INT(11) NOT NULL,
    
    PRIMARY KEY(id_sanpham, id_skin)
);

-- TABLE: skintype
-- Các loại da (Da dầu, Da khô, Da hỗn hợp, etc.)
CREATE TABLE skintype (
    id_skin INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ten_skin VARCHAR(50) NOT NULL,
    mota VARCHAR(255) NULL
);

-- TABLE: thuonghieu  
-- Thông tin thương hiệu
CREATE TABLE thuonghieu (
    id_thuonghieu INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ten_thuonghieu VARCHAR(100) NOT NULL,
    mota VARCHAR(255) NULL,
    quoc_gia VARCHAR(50) NULL,
    ngay_tao TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- TABLE: wishlist
-- Danh sách yêu thích của người dùng
CREATE TABLE wishlist (
    id_wishlist INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_nguoidung INT(11) NOT NULL,
    id_sanpham INT(11) NOT NULL,
    ngay_them TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    
    INDEX(id_nguoidung),
    INDEX(id_sanpham)
);

-- =============================================
-- NOTES ABOUT REVIEWS SYSTEM:
-- =============================================
-- Table 'danhgia' is ready for comment system:
-- - id_nguoidung: Who wrote the review
-- - id_sanpham: Which product was reviewed  
-- - diem_danh_gia: Rating score (1-5 stars)
-- - noi_dung: Review content/comment text
-- - ngay_danh_gia: When review was created
-- =============================================
