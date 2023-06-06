# intern-web
Bài tập dành cho thực tập web
​
## Cách thức làm bài và nộp bài
- Cung cấp tài khoản github cá nhân, để Pionero thêm vào repo tương ứng
- Sau khi thêm vào repo, Pionero sẽ thông báo url của repo
- Clone repo về máy local
- Tạo nhánh mới tên `feature/week_x`, với `x` là tuần tương ứng
- Làm việc trên nhánh mới này
- Khi nào xong thì tạo PR (pull request) tới nhánh `main` và assign cho mentor review PR
- Pionero sẽ review source code và đưa ra feedback
​
## Bài tập
​
### 1. Tuần 1
#### Mục đích
- Làm quen với Laravel
- Tìm hiểu về hệ thống Routing, Views của Laravel
​
​
#### Nội dung
Viết 1 chương trình sử dụng Laravel thực hiện các việc sau:
  - Giả sử hệ thống có 5 user với id từ 1 đến 5  
  - Tạo routing : `/users/{id}` in ra thông tin tương ứng (thông tin bao gồm tên, email, số điện thoại, ...)
  - Nếu truy cập url có dạng `/users/1` thì in ra thông tin của user có id = 1 
  - Nếu truy cập url có dạng `/users` thì in ra danh sách thông tin của các users đang có
  - Sử dụng Views để hiển thị thông tin tương ứng. 
​
#### Yêu cầu:
  - kiểm tra id có phải là số hay không (Route with Regular Expression Constraint)
  - chỉ dùng 1 khai báo Rout duy nhất, nhưng có thể truy cập được cả 2 dạng `/users/1` và `/users` đều hợp lệ
​
### 2. Tuần 2
​
#### Mục đích
- Tích hợp với Database
- Làm quen với Model, Controller
​
#### Nội dung
Viết 1 chương trình sử dụng Laravel thực hiện các việc sau:
  - Config để kết nối với database trong Laravel.
  - Tạo model để tương tác với database
  - Triển khai các tính năng get, list, add, update, delete users sử dụng đầy đủ mô hình MVC
​
#### Yêu cầu:
  - Sử dụng migrations để tạo bảng users.
​
### 3. Tuần 3
#### Mục đích
- Làm quen với Restful API
​
#### Nội dung
Viết 1 web server bằng Laravel thực hiện các việc sau:
  - Triển khai các tính năng get, list, add, update, delete users theo chuẩn Restful API 
  - tham khảo: https://learn.microsoft.com/en-us/azure/architecture/best-practices/api-design
​
#### Yêu cầu:
  - Các method và status khi thành công/lỗi đúng theo chuẩn Restful API
​
### 4. Tuần 4
#### Mục đích
- Làm quen với JWT và Authentication bằng JWT
​
#### Nội dung
 - Tìm hiểu về khái niệm JWT và cơ chế authentication bằng JWT
 - Login bằng JWT và chỉ cho call api khi login
​
​
### 5. Tuần 5
#### Mục đích
- Làm quen với API
- Làm quen với frontend framework
#### Nội dung
Làm lại tuần 3 với các yêu cầu như sau:
- toàn bộ trang sử dụng Reactjs để render
- data được lấy thông qua API
