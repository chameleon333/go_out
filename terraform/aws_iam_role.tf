data "template_file" "task-role-template" {
  template = file("./task_role.json")
}

resource "aws_iam_role" "task-role" {
  name               = "ecsTaskExecutionRoleTest"
  assume_role_policy = data.template_file.task-role-template.rendered
}

resource "aws_iam_role_policy_attachment" "task-role-attachment" {
  role       = aws_iam_role.task-role.name
  policy_arn = "arn:aws:iam::aws:policy/service-role/AmazonECSTaskExecutionRolePolicy"
}