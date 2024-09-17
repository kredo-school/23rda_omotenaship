# # キーペアの作成
resource "aws_key_pair" "deployer" {
  key_name   = "deployer-key"
  public_key = file("~/.ssh/id_rsa_aws.pub") # 公開鍵のパス
}
# ```ssh-keygen -t rsa -b 4096 -C "your_email@example.com"``` で作成した公開鍵を指定
