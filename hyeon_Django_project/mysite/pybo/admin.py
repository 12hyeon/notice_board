from django.contrib import admin
from .models import Question

# 제목으로 질문을 검색할 수 있게
class QuestionAdmin(admin.ModelAdmin):
    search_fields = ['subject']

# 질문 모델을 admin에 등록
admin.site.register(Question)