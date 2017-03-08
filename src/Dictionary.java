import java.io.File;
import java.io.FileNotFoundException;
import java.util.Scanner;

/**
 * Created by Kenny on 07/03/2017.
 */
public class Dictionary implements PasswordCracker {
    private Scanner filein;
    public Dictionary(Scanner input) throws FileNotFoundException {
        System.out.print("Dictionary file: ");
        String file = input.next();
        filein = new Scanner(new File(file));
    }

    @Override
    public String nextPassword() {
        return filein.hasNextLine() ? filein.nextLine() : null;
    }
}
