from django.db import models
from django.contrib.auth.models import User
from django.urls import reverse
# Create your models here.
class BlogUser( models.Model ):
    user = models.OneToOneField(User, on_delete= models.CASCADE)

    def __str__(self):
        return self.user.username

# Create your models here.
class Post(models.Model):
    author = models.ForeignKey( User, on_delete=models.CASCADE )
    title = models.CharField(max_length = 50)
    text = models.TextField()
    update = models.DateTimeField(auto_now = True, auto_now_add=False)
    timestamp = models.DateTimeField(auto_now=False, auto_now_add=True)

    def get_absolute_url(self):
        return reverse('post_list')

    def __str__(self):
        return self.title
