# EC2 用のセキュリティグループ
resource "aws_security_group" "ec2_sg" {
  name        = "ec2-security-group"
  description = "Allow HTTP and SSH access"
  vpc_id      = aws_vpc.main_vpc.id

  # インバウンドルール
  ingress {
    description = "HTTP from anywhere"
    from_port   = 80
    to_port     = 80
    protocol    = "tcp"
    cidr_blocks = ["0.0.0.0/0"] # どこからのアクセスを許可するか
  }

  # インバウンドルール
  ingress {
    description = "SSH from your IP"
    from_port   = 22 # SSHのポート番号
    to_port     = 22 # SSHのポート番号
    protocol    = "tcp"
    cidr_blocks = ["202.208.64.84/32"] # どこからのアクセスを許可するか
    # IP確認：```curl ifconfig.me```
  }

  # アウトバウンドルール
  egress {
    description = "Allow all outbound traffic"
    from_port   = 0
    to_port     = 0
    protocol    = "-1"
    cidr_blocks = ["0.0.0.0/0"] # どこへのアクセスを許可するか
  }
}

# RDS 用のセキュリティグループ
resource "aws_security_group" "rds_sg" {
  name        = "rds-security-group"
  description = "Allow MySQL access from EC2 instances"
  vpc_id      = aws_vpc.main_vpc.id

  # インバウンドルール
  ingress {
    description     = "MySQL from EC2"
    from_port       = 3306
    to_port         = 3306
    protocol        = "tcp"
    security_groups = [aws_security_group.ec2_sg.id]
  }

  # アウトバウンドルール
  egress {
    description = "Allow all outbound traffic"
    from_port   = 0
    to_port     = 0
    protocol    = "-1"
    cidr_blocks = ["0.0.0.0/0"]
  }
}
