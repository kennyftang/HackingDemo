/**
 * Created by Kenny on 07/03/2017.
 */
public class Bruteforce implements PasswordCracker {
    private String current;
    private boolean first;

    public Bruteforce() {
        this.current = "a";
        first = true;
    }

    @Override
    public String nextPassword() {
        if(first) {
            first = false;
            return "a";
        }
        String next = current.substring(0, current.length() - 1);
        char last = current.charAt(current.length() - 1);
        if(last >= 'a' && last < 'z') {
            next += Character.toString((char) (current.charAt(current.length() - 1) + 1));
        } else {
            //Increment the first possible position in the string or add a
            if(current.length() > 1) {
                for (int i = current.length() - 2; i > -1; i--) {
                    if(current.charAt(i) >= 'a' && current.charAt(i) < 'z') {
                        char[] temp = current.toCharArray();
                        temp[i] += 1;
                        for (int j = i + 1; j < temp.length; j++) {
                            temp[j] = 'a';
                        }
                        current = "";
                        for(char c : temp)
                            current += c;
                        return current;
                    }
                }
                current = current.replaceAll(".", "a");
                current += "a";
            } else
                current = "aa";
            return current;
        }
        current = next;
        return next;
    }
}
