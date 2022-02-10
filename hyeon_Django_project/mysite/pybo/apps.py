from django.apps import AppConfig

# config/setting.py에 추가되지 않으면, pybo앱 인식 못하고 DB작업 할 수 없음
class PyboConfig(AppConfig):
    name = 'pybo'
