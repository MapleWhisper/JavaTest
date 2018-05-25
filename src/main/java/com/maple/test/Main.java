package com.maple.test;


import java.util.*;

class Team {
    String name = "";
    int points = 0;
    int getCnt = 0;
    int lostCnt = 0;

    public Team(String name) {
        this.name = name;
    }

    @Override
    public String toString() {
        return "Team{" +
                "name='" + name + '\'' +
                ", points=" + points +
                ", getCnt=" + getCnt +
                ", lostCnt=" + lostCnt +
                '}';
    }
}

public class Main {

    public static void main(String args[]) {
        Scanner scan = new Scanner(System.in);
        while (true) {
            int n = 6;
            HashMap<String, Team> map = new HashMap<>();
            for (int i = 0; i < n; i++) {

                String s = scan.nextLine();
                String str[] = s.split(" ");
                String t1 = str[0];
                String rst = str[1];
                String t2 = str[2];
                Team team1 = map.get(t1);
                Team team2 = map.get(t2);
                if (team1 == null) {
                    team1 = new Team(t1);
                }
                if (team2 == null) {
                    team2 = new Team(t2);
                }
                String rsStr[] = rst.split(":");
                int rs[] = new int[2];
                rs[0] = Integer.parseInt(rsStr[0]);
                rs[1] = Integer.parseInt(rsStr[1]);
                if (rs[0] == rs[1]) {
                    team1.points += 1;
                    team2.points += 1;
                } else if (rs[0] > rs[1]) {
                    team1.points += 3;

                } else {
                    team2.points += 3;
                }
                team1.getCnt += rs[0];
                team1.lostCnt += rs[1];
                team2.getCnt += rs[1];
                team2.lostCnt += rs[0];

                map.put(t1, team1);
                map.put(t2, team2);
            }
            List<Team> teams = new ArrayList<>(map.values());
            Collections.sort(teams, new Comparator<Team>() {
                @Override
                public int compare(Team o2, Team o1) {
                    if (o1.points != o2.points) {
                        return o1.points - o2.points;
                    } else if ((o1.getCnt - o1.lostCnt) != (o2.getCnt - o2.lostCnt)) {
                        return (o1.getCnt - o1.lostCnt) - (o2.getCnt - o2.lostCnt);
                    } else if (o1.getCnt != o2.getCnt) {
                        return o1.getCnt - o2.getCnt;
                    } else if (!o1.name.equals(o2.name)) {
                        return o2.name.compareTo(o1.name);
                    }
                    return 0;
                }
            });
            System.out.print(teams.get(0).name);
//            System.out.println(teams.get(0));
            for (int j = 1; j < teams.size(); j++) {
                System.out.print(" " + teams.get(j).name);
//                System.out.println(teams.get(j));
            }
            System.out.println();
            scan.nextLine();
        }

    }

}

