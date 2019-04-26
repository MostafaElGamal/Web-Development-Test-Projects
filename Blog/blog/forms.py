from django import forms
from .models import BlogUser, Post
from django.contrib.auth.models import User


class UserForm (forms.ModelForm):
    password = forms.CharField(widget=forms.PasswordInput())

    class Meta():
        model = User
        fields = ('username','password','email')

class PostForm( forms.ModelForm ):
    class Meta():
        model =  Post
        fields = ('author', 'title', 'text')
