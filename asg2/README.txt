The purpose of this assignment is to familiarize with serializability. Show the intermediate steps for each answer.

I. Consider the three transactions Ta , Tb , and Tc , and the schedules S1 , S2 , S3 and S4 given below. Which of the schedules is (conflict) serializable? The subscript for each database operation in a schedule denotes the transaction
number for that operation. For each schedule, show all conflicts, draw the precedence graph, determine and write
down if it is serializable or not, and the equivalent serial schedules if exist.

Ta : ra(x); wa(x);
Tb : rb(x);
Tc : rc(x); wc(x);
S1 : ra(x); rc(x); wa(x); rb(x); wc(x);
S2 : ra(x); rc(x); wc(x); wa(x); rb(x);
S3 : rc(x); rb(x); wc(x); ra(x); wa(x);
S4 : rc(x); rb(x); ra(x); wc(x); wa(x);

II. Consider the three transactions T1 , T2 , and T3 , and the schedules S5 and S6 given below. Show all conflicts and draw
the serializability (precedence) graphs for S5 and S6 , and state whether each schedule is serializable or not. If
a schedule is serializable, write down the equivalent serial schedule(s).

T1 : r1(p); r1(r); w1(p);
T2 : r2(r); r2(q); w2(r); w2(q);
T3 : r3(p); r3(q); w3(q);
S5 : r1(p); r2(r); r1(r); r3(p); r3(q); w1(p); w3(q); r2(q); w2(r); w2(q);
S6 : r1(p); r2(r); r3(p); r1(r); r2(q); r3(q); w1(p); w2(r); w3(q); w2(q);