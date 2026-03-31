```sql
CREATE DATABASE pos_system;
USE pos_system;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(50) NOT NULL,
    name_en VARCHAR(255) NOT NULL,
    name_mm VARCHAR(255) NOT NULL,
    category_en VARCHAR(255) NOT NULL,
    category_mm VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL DEFAULT 0
);

CREATE TABLE sales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    qty INT NOT NULL,
    total_amount DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id)
);

INSERT INTO products (code, name_en, name_mm, category_en, category_mm, price, stock) VALUES
('P001', 'Coffee Mix', 'ကော်ဖီမစ်', 'Drink', 'အဖျော်ယမကာ', 1200, 20),
('P002', 'Shampoo', 'ခေါင်းလျှော်ရည်', 'Care', 'ကိုယ်ပိုင်အသုံးအဆောင်', 3500, 10),
('P003', 'Soft Drink', 'အအေးသောက်ရည်', 'Drink', 'အဖျော်ယမကာ', 1800, 15);
`
``
