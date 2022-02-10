from django.db import models

class Question(models.Model):
    subject = models.CharField(max_length=200) # 제목
    content = models.TextField() # 내용
    # TextField() : 글자수 제한 없음
    create_date = models.DateTimeField() # 작성 일시

    def __str__(self): # 데이터 확인시, 제목 출력
        return self.subject

class Answer(models.Model): # 모델의 속성을 지녀야함
    question = models.ForeignKey(Question, on_delete=models.CASCADE)
    # ForeignKey() : 타모델의 속성을 이용하는 경우 사용
    # on_delete=models.CASCADE : 질문 삭제시, 답변도 삭제
    content = models.TextField()
    create_date = models.DateTimeField()