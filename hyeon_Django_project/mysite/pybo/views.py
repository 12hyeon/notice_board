"""
from django.http import HttpResponse

def index(request):
    return HttpResponse("안녕하세요 pybo에 오신것을 환영합니다.")
"""

from django.shortcuts import render, get_object_or_404, redirect
from django.utils import timezone
from .models import Question


def index(request):
    question_list = Question.objects.order_by('-create_date')
    # order_by() : 조회한 데이터를 특정 속성으로 정렬
    context = {'question_list': question_list}
    # 아래 render() : 탬플릿을 html로 변환
    # context의 qustion_list를 pybo/questino_list.html 파일에 적용
    return render(request, 'pybo/question_list.html', context)


def detail(request, question_id):
    # question = Question.objects.get(id=question_id)
    question = get_object_or_404(Question, pk=question_id)
    # pk에 해당하는 것이 없으면 404페이지 반환
    context = {'question': question}
    return render(request, 'pybo/question_detail.html', context)


def answer_create(request, question_id):
    question = get_object_or_404(Question, pk=question_id)
    question.answer_set.create(content=request.POST.get('content'), create_date=timezone.now())
    # question.answer_set.create : 질문 모델을 통해 대답 모델 데이터를 생성하기 위함
    # request.POST.get('content') : textarea에 입력된 데이터 값 추출

    # 동일
    # answer = Answer(question=question, content=request.POST.get('content'), create_date=timezone.now())
    # answer.save()
    # redirect() : 답변 생성 후 상세화면 출력
    return redirect('pybo:detail', question_id=question.id)


from .forms import QuestionForm


def question_create(request):
    #form = QuestionForm()
    #return render(request, 'pybo/question_form.html', {'form': form})
    if request.method == 'POST':
        # 입력 값을 채우고, 저장하기 버튼을 누르면
        # /pybo/question/create/가 POST방식으로 요청되어 데이터 저장
        form = QuestionForm(request.POST) # 폼 값이 채워지도록 객체 생성
        if form.is_valid(): # 폼이 유효한지 검사
            question = form.save(commit=False)
            # form으로 Question 모델 데이터 저장을 위한 코드, commit=False : 임시저장
            # 아직 모델의 create_date 값이 설정되지 않아서 오류발생해서 임시 저장 이용
            question.create_date = timezone.now()
            question.save() # 실제 저장
            return redirect('pybo:index')
    else: # request.method == 'GET'
        # 글쓰기 버튼을 누르면
        # /pybo/question/create/가 GET방식으로 요청되어 등록 화면 등장
        form = QuestionForm() # 입력값 없이 객체 생성
    context = {'form': form}
    return render(request, 'pybo/question_form.html', context)
