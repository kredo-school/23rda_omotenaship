# #  インターネットゲートウェイの作成
# resource "aws_internet_gateway" "igw" {
#   vpc_id = aws_vpc.main_vpc.id
# }

# # ルートテーブルの作成
# resource "aws_route_table" "public_rt" {
#   vpc_id = aws_vpc.main_vpc.id

#   route {
#     cidr_block = "0.0.0.0/0"
#     gateway_id = aws_internet_gateway.igw.id
#   }
# }

# # ルートテーブルの関連付け
# resource "aws_route_table_association" "public_assoc" {
#   subnet_id      = aws_subnet.public_subnet.id
#   route_table_id = aws_route_table.public_rt.id
# }
