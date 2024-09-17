# # サブネットの作成
# resource "aws_subnet" "public_subnet" {
#   vpc_id                  = aws_vpc.main_vpc.id
#   cidr_block              = "10.0.1.0/24"
#   availability_zone       = "ap-northeast-1a"
#   map_public_ip_on_launch = true
# }
