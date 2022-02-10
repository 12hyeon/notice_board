from django import forms
from pybo.models import Question


class QuestionForm(forms.ModelForm): # 모델과 연결된 폼
    # 모델 폼 객체 저장시, 모델 폼의 데이터 저장 가능
    class Meta: # 장고의 모델 폼이 내부에 가져야할 필수 class
        model = Question  # 사용할 모델
        fields = ['subject', 'content']  # 모델의 속성