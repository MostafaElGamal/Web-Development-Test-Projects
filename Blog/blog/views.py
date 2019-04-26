from django.shortcuts import render
from .models import Post
from .forms import UserForm, PostForm
from django.urls import reverse, reverse_lazy
from django.http import HttpResponseRedirect, HttpResponse
from django.contrib.auth import authenticate, login, logout
from django.contrib.auth.decorators import login_required
from django.contrib.auth.mixins import LoginRequiredMixin
from django.views.generic import (TemplateView,UpdateView,
                                  ListView,DetailView,
                                  CreateView,DeleteView
                                  )

# Create your views here.
def main(request):
    return render(request,'blog/main.html')

def register(request):
    registered = False

    if request.method == 'POST':
        user_form = UserForm(data=request.POST)

        if user_form.is_valid():
            user = user_form.save()
            user.set_password(user.password)
            user.save()

            registered = True
        else:
            print(user_form.errors)
    else:
        user_form = UserForm()
    return render(request, 'user/register.html', {
                                                 'user_form':user_form,
                                                 'registered':registered
                                                    })

def user_login(request):
    if request.method == 'POST':
        username = request.POST.get('username')
        password = request.POST.get('password')
        user = authenticate(username = username, password = password)

        if user:
            if user.is_active:
                login(request, user)
                return HttpResponseRedirect(reverse('post_list'))
            else:
                return HttpResponse("Your account is not active.")
        else:
            return HttpResponse("Invalid login details supplied.")
    else:
        return render(request, 'user/login.html', {})

@login_required
def user_logout(request):

    logout(request)
    return HttpResponseRedirect(reverse('main'))



# Create your Postviews here.
class Home(TemplateView):
    template_name = 'app/home.html'

class PostListView(LoginRequiredMixin,ListView):
    login_url = '/login/'
    context_object_name = 'post_list'
    model = Post

class PostDetailView(LoginRequiredMixin,DetailView):
    login_url = '/login/'
    context_object_name = 'post_detail'
    model = Post

class PostCreateView(LoginRequiredMixin,CreateView):
    login_url = '/login/'
    context_object_name = 'create_post'
    model = Post
    fields = ('title', 'author','text')

class PostUpdateView(LoginRequiredMixin,UpdateView):
    login_url = '/login/'
    model = Post
    fields = ('title', 'text')

class PostDeleteView(LoginRequiredMixin,DeleteView):
    login_url = '/login/'
    context_object_name = 'post_delete'
    model = Post
    success_url = reverse_lazy('post_list')
