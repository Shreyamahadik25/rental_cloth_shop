#include <stdio.h>
struct Student
{
	int id;			 
	float per;		
};				
int main()
{
	struct Student s;

	printf("\n Enter the id and percentage of student ");
	scanf("%d %f",&s.id, &s.per);

	printf("\n Student id: %d \t Percentage: %f",s.id, s.per);

	return 0;
}
