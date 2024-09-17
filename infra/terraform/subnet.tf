resource "aws_subnet" "subnet_a" {
  vpc_id                  = aws_vpc.main_vpc.id # VPCのIDを参照
  cidr_block              = "10.0.1.0/24" # CIDRブロック
  availability_zone       = "ap-northeast-1a" # 東京リージョンのAZを指定
  map_public_ip_on_launch = true # インスタンス起動時にパブリックIPを自動割り当て
}

resource "aws_subnet" "subnet_c" {
  vpc_id                  = aws_vpc.main_vpc.id # VPCのIDを参照
  cidr_block              = "10.0.2.0/24" # CIDRブロック
  availability_zone       = "ap-northeast-1c" # 東京リージョンのAZを指定
  map_public_ip_on_launch = true # インスタンス起動時にパブリックIPを自動割り当て
}
