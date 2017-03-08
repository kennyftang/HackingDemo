import java.io.IOException;
import java.util.Scanner;

/**
 * Created by Kenny on 07/03/2017.
 */
public class Runner {
    public static void main(String[] args) throws IOException {
        Scanner input = new Scanner(System.in);
        System.out.print("Enter your \"secure\" password: ");
        String password = input.next();
        System.out.println("Methods: ");
        System.out.println("\t1. Bruteforce");
        System.out.println("\t2. Dictionary Attack");
        System.out.print("Please select your method: ");
        int method = input.nextInt();
        PasswordCracker cracker;
        switch (method) {
            case 1:
                cracker = new Bruteforce();
                break;
            case 2:
                cracker = new Dictionary(input);
                break;
            default:
                cracker = null;
        }
        System.out.println("Working...");
        long starttime = System.nanoTime();
        int i;
        String next = cracker.nextPassword();
        for(i = 0; !next.equals(password); i++){
            next = cracker.nextPassword();
            if(cracker instanceof Dictionary && next == null) {
                System.out.printf("%dPassword not found in dictionary after %.4f seconds", i, (System.nanoTime() - starttime) / 1000000000d);
                return;
            }
        }
        long finishtime = System.nanoTime();
        System.out.printf("Password found! Took %d iterations to crack, %.4f seconds", i + 1, (finishtime - starttime) / 1000000000d);
    }
}
