from django.contrib import admin
from django.urls import path
from blog import views



urlpatterns = [
    path('create/',views.PostCreateView.as_view(), name = 'create_post'),
    path('update/<int:pk>/',views.PostUpdateView.as_view(), name = 'post_update'),
    path('delete/<int:pk>/', views.PostDeleteView.as_view(), name = 'post_delete'),
    path('detail/<int:pk>/', views.PostDetailView.as_view(), name = 'post_detail'),
    path('posts/',views.PostListView.as_view(), name = 'post_list' ),
    path('login/', views.user_login, name = 'user_login'),
    path('logout/', views.user_logout, name = 'user_logout'),
    path('register/', views.register, name = 'register'),
    path('admin/', admin.site.urls),
]
