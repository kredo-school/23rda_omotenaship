variable "db_username" {
  description = "Database username"
  type        = string
}

variable "db_password" {
  description = "Database password"
  type        = string
  sensitive   = true # 機密情報であることを示す
}

variable "your_ip" {
  description = "Your public IP address"
  type        = string
}
