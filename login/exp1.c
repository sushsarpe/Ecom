/*
Name:Sushil A. Sarpe
Roll No:19CE7008
Batch:C4
Date:14/08/2020
*/
#include<stdio.h>
#include<string.h>
#define max 50

//stack data structure
struct stack{
    char name[max];
    int top;
}myStack;

//check stack is is_Empty or not
int is_Empty()
{
    if(myStack.top==-1)
    {
        return 1;
    }
    else
    {
        return 0;
    }
}

int is_Full()
{
    if(myStack.top==max-1)
    {
        return 1;
    }
    else
    {
        return 0;
    }
}

//adds a element into the stack
void push(char c){
    if(!is_Full())
    {
        myStack.top++;
        myStack.name[myStack.top]=c;
    }
}

//removes a element from stack
char pop(){
    char temp;
    if(!is_Empty())
    {
        temp=myStack.name[myStack.top];
        myStack.top--;
    }
    return temp;
}

int main() 
{
    myStack.top=-1;
    char s[max];
    char s2[max];
    printf("Enter the String:");
    scanf("%s",s);
    
    //This loop will push all the elements of  String 's'
    int i=0;
    while(s[i]!='\0')
    {
        push(s[i]);
        i++;
    }
    
    //This loop Will pop the elements of String 's'
    // and copy each element in String 's2'  
    int x,j=0;
    while(!is_Empty())
    {
        x=pop();
        s2[j]=x;
        j++;
    }
    
    //Compares both the String  
    if(strcmp(s,s2)==0)
    {
        printf("Palindrome");
    }
    else
    {
        printf("Not Palindrome");
    }
    return 0;
}
  